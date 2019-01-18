<?php
/**
 * Created by PhpStorm.
 * User: Clement
 * Date: 18/01/2019
 * Time: 13:52
 */

spl_autoload_register(function ($class_name) {
    if(file_exists(strtolower($class_name . ".class.php")))
        include strtolower($class_name . ".class.php");
});
