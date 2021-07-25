<?php

spl_autoload_register('AutoLoaderClasses');

function AutoLoaderClasses($className){
    $path = "classes/";
    $extension = '.class.php';
    $fullPath = $path . $className . $extension;

    if(!file_exists($fullPath)){
        return false;
    }

    include_once $fullPath;
}