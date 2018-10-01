<?php
session_start();
require_once "config.php";

spl_autoload_register(function($class){
    if(strpos($class, 'Controller') > -1){
        if(file_exists("controllers/".$class.".php")):
            require "controllers/".$class.".php";
        endif;
    }elseif(file_exists("models/".$class.".php")){
        require "models/".$class.".php";
    }else{
        require "core/".$class.".php";
    }
});

$core = new Core();
$core->run();