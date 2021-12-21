<?php
function autoload($classname)
{
    $classname = str_replace('\\', '/', $classname);
    include_once('Lib/'.$classname.'.class.php');
}
spl_autoload_register('autoload');