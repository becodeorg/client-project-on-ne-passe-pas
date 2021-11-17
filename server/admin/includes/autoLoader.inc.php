<?php

spl_autoload_register('autoLoader');

function autoLoader($class)
{
    $path = "classes/";
    $extension = ".class.php";
    $fullPath = $path . $class . $extension;

    include_once $fullPath;
}