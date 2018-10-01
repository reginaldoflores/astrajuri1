<?php
require 'enviroment.php';

define("HOME", "http://localhost/astrajuri");
/*define("HOME", "http://astrajuri.online");*/

global $config;

$config = array();

if(ENVIRONMENT == "development"):
    $config['dbname']   =   "astrajuri";
    $config['host']     =   "localhost";
    $config['dbuser']   =   "root";
    $config['dbpass']   =   "";
else:
    $config['dbname']   =   "astrajuri";
    $config['host']     =   "mysql942.umbler.com";
    $config['dbuser']   =   "reginaldo";
    $config['dbpass']   =   "Regi1234";
endif;

global $pdo;

$pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);