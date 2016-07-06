<?php
require 'config.php';
require 'util/Auth.php';
require './libs/DOM/UsuarioDOM.php';
require './libs/DOM/MesaDOM.php';
require './libs/DOM/ComandaDOM.php';

function __autoload($class) { 
    if (file_exists(LIBS . $class . ".php")) { 
        require LIBS . $class . ".php"; 
        
    } else { 
        if (file_exists(MODS . $class . ".php")) { 
            require MODS . $class . ".php"; 
            
        } 
        
    } 
    
}


$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath();
//$bootstrap->setModelPath();
//$bootstrap->setDefaultFile();
//$bootstrap->setErrorFile();

$bootstrap->init();