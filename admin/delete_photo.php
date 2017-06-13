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


if (empty($_GET['photo_id'])){

    redirect("../photo.php");
}


$photo = Photos::find_id($_GET['photo_id']);

if ($photo){
    //call the delete method
    $photo->delete_photo($photo->id);


}else{
    redirect("../photo.php");
}