<?php

function autoloadClass(string $className) {
    $classFile = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    $file = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR.$classFile.".php";
    if (file_exists($file)) require_once $file;
}

spl_autoload_register("autoloadClass");