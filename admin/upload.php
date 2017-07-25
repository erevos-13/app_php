<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");  } ?>

<?php
$message = "";
if (isset($_FILES['file'])){

   $photo = new Photos();
   $photo->title = $_POST['title'];
   $photo->date = date("Y-m-d H:i:s");
   //then i call the method for upload file
    $photo->set_file($_FILES['file']);

    //if all is ok then print a message
    if ($photo->save()){
        $message = "The photo is upload Succesfully";
    }else{
        $message = join("<br>", $photo->error);
    }
}

?>




    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <?php include("includes/top_nav.php") ?>


        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include "includes/side_bar.php"?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Upload
                        <small>Subheading</small>
                    </h1>

                    <div class="row">
                        <div class="col-md-6">
                            <?php echo $message; ?>
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file" >
                                </div>

                                <input type="submit" name="submit">
                            </form>
                        </div> <!-- End of row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <form action="upload.php" class="dropzone">

                                </form>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>