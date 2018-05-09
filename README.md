Barra Parking
============

<Description>

Requirements
------------
* VirtualBox <http://www.virtualbox.org>
* Vagrant <http://www.vagrantup.com>
* Git <http://git-scm.com/>

Optional tools
------------
* Pgadmin <https://www.pgadmin.org/>

Usage
-----

### Startup

1. From the command-line
*(use git bash if you are on Windows, to avoid PowerShell version issues)*:
```
$ vagrant up
```

### Connecting

#### Apache
The Apache server is available at <http://localhost:8888>

#### Postgres
Externally the Postgres server is available at port 15432, and when running on the VM it is available at port 5432 as usual.
Username: root
Password: root

To access psql run this from command-line:
```
$ vagrant ssh
$ sudo su - postgres
$ psql
postgres=# <Run your SQL commands here>
```

### Symfony web server
You can optionally run the symfony embedded web server on your local machine.
To do so, go to the symfony project root folder and run the following from command-line:
```
$ php -S 127.0.0.1:8000 -t public
```
Bear in mind that if you do this you will have to change your app configuration to listen Posgtres from the forwarded vagrant port, since symfony web server runs on your computer and not on the virtual machine.

Technical Details
-----------------
* Ubuntu 14.04 64-bit
* Apache 2.4
* PHP 5.5
* Postgres 9.4
* XDebug
* PHPUnit 4.8
* Composer
* Symfony <version>

We are using the base Ubuntu 14.04 box from Vagrant. If you don't already have it downloaded
the Vagrantfile has been configured to do it for you. This only has to be done once
for each account on your host computer.

The web root is located in the project directory at `app/`.

And like any other vagrant file you have SSH access with
```
$ vagrant ssh
```