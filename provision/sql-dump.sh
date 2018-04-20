echo "--Beginning the SQL provisioning--"

DB_USER=root
DB_PASS=root
DB_NAME=barra_parking
SPATIAL_DB_NAME=spatial_barra_parking

cat << EOF | su - postgres -c psql
	CREATE USER $DB_USER WITH PASSWORD '$DB_PASS';
    
    -- Create the database user:
    CREATE USER DB_USER WITH PASSWORD '$DB_PASS';

    -- Create the databases:
    CREATE DATABASE $DB_NAME WITH OWNER=$DB_USER
                                    LC_COLLATE='en_US.utf8'
                                    LC_CTYPE='en_US.utf8'
                                    ENCODING='UTF8'
                                    TEMPLATE=template0;
                                    
    CREATE DATABASE $SPATIAL_DB_NAME WITH OWNER=$DB_USER
                                    LC_COLLATE='en_US.utf8'
                                    LC_CTYPE='en_US.utf8'
                                    ENCODING='UTF8'
                                    TEMPLATE=template0;
EOF

su - postgres -c psql postgres < /vagrant/provision-sql/postgres.sql
su - postgres -c psql barra_parking < /vagrant/provision-sql/barra_parking.sql
su - postgres -c psql spatial_barra_parking < /vagrant/provision-sql/spatial_barra_parking.sql

exit 0