#!/bin/bash

apache_config_file="/etc/apache2/envvars"
apache_vhost_file="/etc/apache2/sites-available/vagrant_vhost.conf"
php_config_file="/etc/php5/apache2/php.ini"
xdebug_config_file="/etc/php5/mods-available/xdebug.ini"
mysql_config_file="/etc/mysql/my.cnf"
default_apache_index="/var/www/html/index.html"
project_web_root="app"
PG_VERSION=9.4

# This function is called at the very bottom of the file
main() {
    repositories_go
    update_go
    network_go
    tools_go
    apache_go
    #mysql_go
    postgres_go
    php_go
    autoremove_go
}

repositories_go() {
    echo "NOOP"
}

update_go() {
    # Update the server
    apt-get update
    # apt-get -y upgrade
}

autoremove_go() {
    apt-get -y autoremove
}

network_go() {
    IPADDR=$(/sbin/ifconfig eth0 | awk '/inet / { print $2 }' | sed 's/addr://')
    sed -i "s/^${IPADDR}.*//" /etc/hosts
    echo ${IPADDR} ubuntu.localhost >> /etc/hosts			# Just to quiet down some error messages
}

tools_go() {
    # Install basic tools
    apt-get -y install build-essential binutils-doc git subversion
}

apache_go() {
    # Install Apache
    apt-get -y install apache2 apache2-utils

    sed -i "s/^\(.*\)www-data/\1vagrant/g" ${apache_config_file}
    chown -R vagrant:vagrant /var/log/apache2

    if [ ! -f "${apache_vhost_file}" ]; then
        cat << EOF > ${apache_vhost_file}
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /vagrant/${project_web_root}
    LogLevel debug

    ErrorLog /var/log/apache2/error.log
    CustomLog /var/log/apache2/access.log combined

    <Directory /vagrant/${project_web_root}>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
    fi

    a2dissite 000-default
    a2ensite vagrant_vhost

    a2enmod rewrite

    service apache2 reload
    update-rc.d apache2 enable
}

php_go() {
    apt-get -y install php5 php5-curl php5-xdebug php-pear php5-pgsql
    #php5-mysql php5-sqlite

    sed -i "s/display_startup_errors = Off/display_startup_errors = On/g" ${php_config_file}
    sed -i "s/display_errors = Off/display_errors = On/g" ${php_config_file}

    if [ ! -f "{$xdebug_config_file}" ]; then
        cat << EOF > ${xdebug_config_file}
zend_extension=xdebug.so
xdebug.remote_enable=1
xdebug.remote_connect_back=1
xdebug.remote_port=9000
xdebug.remote_host=10.0.2.2
EOF
    fi

    service apache2 reload

    # Install latest version of Composer globally
    if [ ! -f "/usr/local/bin/composer" ]; then
        curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    fi

    # Install PHP Unit 4.8 globally
    if [ ! -f "/usr/local/bin/phpunit" ]; then
        curl -O -L https://phar.phpunit.de/phpunit-old.phar
        chmod +x phpunit-old.phar
        mv phpunit-old.phar /usr/local/bin/phpunit
    fi
}

mysql_go() {
    # Install MySQL
    echo "mysql-server mysql-server/root_password password root" | debconf-set-selections
    echo "mysql-server mysql-server/root_password_again password root" | debconf-set-selections
    apt-get -y install mysql-client mysql-server

    sed -i "s/bind-address\s*=\s*127.0.0.1/bind-address = 0.0.0.0/" ${mysql_config_file}

    # Allow root access from any host
    echo "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'root' WITH GRANT OPTION" | mysql -u root --password=root
    echo "GRANT PROXY ON ''@'' TO 'root'@'%' WITH GRANT OPTION" | mysql -u root --password=root

    if [ -d "/vagrant/provision-sql" ]; then
        echo "Executing all SQL files in /vagrant/provision-sql folder ..."
        echo "-------------------------------------"
        for sql_file in /vagrant/provision-sql/*.sql
        do
            echo "EXECUTING $sql_file..."
            time mysql -u root --password=root < $sql_file
            echo "FINISHED $sql_file"
            echo ""
        done
    fi

    service mysql restart
    update-rc.d apache2 enable
}

postgres_go() {
    export DEBIAN_FRONTEND=noninteractive

    PROVISIONED_ON=/etc/vm_provision_on_timestamp
    if [ -f "$PROVISIONED_ON" ]
    then
        echo "VM was already provisioned at: $(cat $PROVISIONED_ON)"
        echo "To run system updates manually login via 'vagrant ssh' and run 'apt-get update && apt-get upgrade'"
    fi

    PG_REPO_APT_SOURCE=/etc/apt/sources.list.d/pgdg.list
    if [ ! -f "$PG_REPO_APT_SOURCE" ]
    then
    # Add PG apt repo:
    echo "deb http://apt.postgresql.org/pub/repos/apt/ trusty-pgdg main" > "$PG_REPO_APT_SOURCE"

    # Add PGDG repo key:
    wget --quiet -O - https://apt.postgresql.org/pub/repos/apt/ACCC4CF8.asc | apt-key add -
    fi

    # Update package list and upgrade all packages
    apt-get update
    apt-get -y upgrade

    apt-get -y install "postgresql-$PG_VERSION" "postgresql-contrib-$PG_VERSION" postgresql-$PG_VERSION-postgis-2.1 -f

    PG_CONF="/etc/postgresql/$PG_VERSION/main/postgresql.conf"
    PG_HBA="/etc/postgresql/$PG_VERSION/main/pg_hba.conf"
    PG_DIR="/var/lib/postgresql/$PG_VERSION/main"

    # Edit postgresql.conf to change listen address to '*':
    sed -i "s/#listen_addresses = 'localhost'/listen_addresses = '*'/" "$PG_CONF"

    # Append to pg_hba.conf to add password auth:
    echo "host    all             all             all                     md5" >> "$PG_HBA"

    # Explicitly set default client_encoding
    echo "client_encoding = utf8" >> "$PG_CONF"

    # Restart so that all new config is loaded:
    service postgresql restart

    # Tag the provision time:
    date > "$PROVISIONED_ON"
}

main

exit 0
