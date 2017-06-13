<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 30/5/2017
 * Time: 11:39 μμ
 */

// this the include the files

defined("orfeas") ? null  : define('orfeas', DIRECTORY_SEPARATOR) ;

defined('SITE_ROOT') ? null : define('SITE_ROOT', orfeas. 'var'.orfeas.'www'.orfeas.'html'.orfeas.'udemy'.orfeas.'app_php');

defined('INCLUDES_PATH') ? null :define('INCLUDES_PATH', SITE_ROOT.orfeas.'admin'.orfeas.'includes');


require_once "session.php";
require_once "db_object.php";
require_once "Photos.php";
require_once "new_config.php";
require_once "database.php";
require_once "user.php";
require_once "function.php"; //this the way that has only going to use the file once in the app.

