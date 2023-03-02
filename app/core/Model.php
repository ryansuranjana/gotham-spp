<?php 

spl_autoload_register(function($class){
    require_once '../app/models/' . $class . '.php';
});