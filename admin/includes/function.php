<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 1/6/2017
 * Time: 10:07 μμ
 *
 * this file can see if an file is missing from init.php
 */

// i will make a function much better.
/*function __autoload($class){
    $class = strtolower($class);

    $the_path = "includes/{$class}.php";

    if (file_exists($the_path)){

        require_once "$the_path";
    }else {
        die("<br/>The file name:<b> {$class}.php </b> was not found");
    }
}*/

//in this function if a file is not exits is going to loaded.

function classAutoLoader($class)
{
    $class = strtolower($class);

    $the_path = "includes/{$class}.php";



    if (is_file($the_path) && !class_exists($class)) {

        include $the_path;
    } else {
        die("<br/>The file name:<b> {$class}.php </b> was not found");
    }



}

function redirect($location){
    header("Location: {$location}");
}


//if i forgot a file to included then tha function bellow is included
spl_autoload_register("classAutoLoader");


