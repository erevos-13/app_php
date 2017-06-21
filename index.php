<?php include("includes/header.php"); ?>

<?php

    $page= !empty($_GET['page']) ? (int)$_GET['page'] : 1;

    $items_per_page = 2;
    $items_total_count = Photos::count_all();

    $photos = Photos::find_all();






?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <div class="thumbnail row" >

                <?php foreach ($photos as $photo): ?>



                <div class="col-xs-6 col-md-3">
                    <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
                        <img class="home_page_photo img-responsive" src="admin/<?php echo $photo->picture_path();  ?>"/>
                    </a>

                </div>







                <?php endforeach; ?>

                </div>
            
          
         

            </div>
        </div>





            <!-- Blog Sidebar Widgets Column -->
            <!--<div class="col-md-4">

            
                 <?php /*include("includes/sidebar.php"); */?>



        </div>-->
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
