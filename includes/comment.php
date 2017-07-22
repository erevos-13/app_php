<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 4/7/2017
 * Time: 3:43 μμ
 */
require_once "../admin/includes/init.php";

$data = $_REQUEST;
$photo_id = $data['photo_id_comment'];
if (isset($data['photo_id_comment']) &&  isset($data['author']) && isset($data['body']) ){
    $author = trim($data['author']);
    $body = trim($data['body']);

    $new_comment = Comment::create_comment($photo_id ,$author, $body);

    if ($new_comment &&  $new_comment->save()){

//        redirect("photo.php?id={$photo->id}");
    }else{
        $message = "There was some problems save";
    }

}


//$comments = Comment::find_the_comments($photo_id);

$con = mysqli_connect('localhost','root','erevos13','gallery');

$sql  = "SELECT * FROM comments";
$sql .= " WHERE photo_id = " . $database->escape_string($photo_id);
$sql .= " ORDER  BY photo_id ASC";

$result = mysqli_query( $con,$sql);

$arr = array();
$row_count = mysqli_num_rows($result);

$html = '';
    while ($row = mysqli_fetch_array($result)){
        echo "<h3>".$row['author']."</h3>";
        echo "<p>".$row['body']."</p>";
        echo "<pre>Time post @ :".$row['date']."</pre>";


    }


mysqli_close($con);




?>