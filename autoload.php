<?php

if (file_exists('vendor/autoload.php')) {
    include('vendor/autoload.php');
}

function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .=  str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $fileName = __DIR__.DIRECTORY_SEPARATOR.$fileName;
    if (file_exists($fileName)) {
        require $fileName;
    }
}
spl_autoload_register('autoload');

ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_USER_NOTICE);
