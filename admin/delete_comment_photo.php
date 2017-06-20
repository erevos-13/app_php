<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 16/6/2017
 * Time: 8:46 μμ
 * This is the file i make for user to delete.
 */
include "includes/init.php";
if(!$session->is_signed_in()){redirect("login.php");}

if (empty($_GET['id'])){

    redirect("photo_comments.php?id={$comment->photo_id}");
}


$user = Comment::find_id($_GET['id']);

if ($user){
    //call the delete method
    $user->delete();
    redirect("photo_comments.php?id={$comment->photo_id}");


}else{
    redirect("photo_comments.php?id={$comment->photo_id}");
}

