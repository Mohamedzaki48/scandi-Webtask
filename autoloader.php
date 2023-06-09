<?php
spl_autoload_register(function ($className) {

    $strArray = explode('\\',$className);

    $folder = $strArray[1];
    
    $class = $strArray[2];
    $ds = DIRECTORY_SEPARATOR;
    $dir = __DIR__;
    $file = "{$dir}{$ds}{$folder}{$ds}{$class}.php";
    if (file_exists($file)) {require_once $file;}
       
});
?>


