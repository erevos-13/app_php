<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 23/6/2017
 * Time: 10:22 μμ
 */
require "init.php";
$user = new Users();

if (isset($_POST['image_name'])){


    $user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);

}

if (isset($_POST['photo_id'])){

Photos::display_sidebar_data($_POST['photo_id']);

}