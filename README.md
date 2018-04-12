Barra Parking
============

Tired of having to look for parking on Barra beach (Aveiro, Portugal) ?

This web application aims to solve your trouble with parking on this location.

We provide a set of useful indications that can save you time and indicate you the nearest free parking slot, by simply going to our site.

Requirements
------------
* VirtualBox <http://www.virtualbox.org>
* Vagrant <http://www.vagrantup.com>
* Git <http://git-scm.com/>

Usage
-----

### Startup

1. 
2. 
3. From the command-line:
```
$ cd vagrant-lamp-release
$ vagrant up
```
That is pretty simple.

### Connecting

#### Apache
The Apache server is available at <http://localhost:8888>

#### MySQL
Externally the MySQL server is available at port 8889, and when running on the VM it is available as a socket or at port 3306 as usual.
Username: root
Password: root

Technical Details
-----------------
* Ubuntu 14.04 64-bit
* Apache 2.4
* PHP 5.5
* MySQL 5.5
* XDebug
* PHPUnit 4.8
* Composer
* Symfony XXX

We are using the base Ubuntu 14.04 box from Vagrant. If you don't already have it downloaded
the Vagrantfile has been configured to do it for you. This only has to be done once
for each account on your host computer.

The web root is located in the project directory at `app/`.

And like any other vagrant file you have SSH access with
```
$ vagrant ssh
```