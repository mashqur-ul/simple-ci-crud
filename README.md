# Simple CI CRUD

This is a simple CRUD based application for education purpose only. This application is built with PHP COdeIgniter framework.
  
## Getting Started

The following instruction will guide you through the installation procedure at your localhost for testing purpose.

### Prerequisites

* Web Server such as Apache with PHP and MySQL installed.
* You Can also use WAMP, LAMP or XAMPP stack according to your preference.


### Installing

* Step-1: Download the project from github repository and extract it at the root of your local server root drectory. Incase of XAMP it will be your htdocs folder. (You can use https://github.com/mashqur-ul/simple-ci-crud.git also)
* Step-2: Import database using the db_simple_ci_crud.sql file from the downloaded project root.
* Configure databse connection in the file application/config/database.php. If you are using XAMPP your configuration should look like the following

```
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'db_simple_ci_crud',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```
You should change your hostname, username, password and database according to your configuration.
*Step-3: change the base_url configuration according to your project root path in the file application/config/config.php
```
$config['base_url'] = 'http://localhost/simple-ci-crud/';
```

## Built With

* [CodeIgniter](https://codeigniter.com/) - The PHP framework
* [Bootstrap](http://getbootstrap.com/) - HTML CSS framework



## Authors

* [Md Mashqur Ul Alam](https://github.com/mashqur-ul)
