Barra Parking
============

<Description>

Requirements
------------
* VirtualBox <http://www.virtualbox.org>
* Vagrant <http://www.vagrantup.com>
* Git <http://git-scm.com/>
*

Optional tools
------------
* Pgadmin <https://www.pgadmin.org/>
*

Usage
-----

### Startup

1. From the command-line:
```
$ vagrant up
```
2. 

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