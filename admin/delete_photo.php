<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 13/6/2017
 * Time: 9:17 μμ
 * This is the page where i delete the file.
 */
include "includes/init.php";

if(!$session->is_signed_in()){redirect("login.php");}


if (empty($_GET['id'])){

    redirect("photo.php");
}


$photo = Photos::find_id($_GET['id']);

if ($photo){
    //call the delete method
    $photo->delete_photo();
    redirect("photos.php");


}else{
    redirect("photo.php");
}