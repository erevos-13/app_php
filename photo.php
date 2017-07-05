<?php include("includes/header.php"); ?>
<?php

require_once "admin/includes/init.php";



/*if (empty($_GET['id'])){

    redirect("index.php");
}*/

$photo = Photos::find_by_id($_GET['photo_id_comment']);

$comments = Comment::find_the_comments($_GET['photo_id_comment']);



?>


            <!-- Blog Post Content Column -->
            <div class="col-lg-12">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo->title; ?></h1>


                <!-- Author -->
                <p class="lead">
                    by <a href="http://orfeasvou.com/resume_4/" target="_blank">Orfeas Boytsaridis</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Upload at: <?php echo $photo->date; ?> </>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $photo->picture_path(); ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"> <?php echo $photo->caption; ?> </p>
                <p><?php echo $photo->description; ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->

                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form  onsubmit="return addComment();">


                        <div class="form-group">

                            <input id="photo_id_comment" type="hidden" name="photo_id_comment" class="form-control" value="<?php echo $photo->id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input id="author" type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Message:</label>
                            <textarea id="body" name="body" class="form-control" rows="3"></textarea>
                        </div>

                        <button  id="submit" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->


                <div class="media">

                    <div class="media-body" id="comment">
                        <p id="comment"  class="media-heading"></p>









                    </div>

                </div>









            </div>

<!-- Blog Sidebar Widgets Column -->
<!--<div class="col-md-4">-->


    <?php /*include("includes/sidebar.php"); */?>



<!--</div>-->
<!-- /.row -->

<?php include("includes/footer.php"); ?>


