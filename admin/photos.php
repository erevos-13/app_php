<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");  } ?>

<?php
    $photos = Photos::find_all();

    




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
                        Photos
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>File name</th>
                                <th>Size </th>
                                
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($photos as $photo) : ?>


                                <tr>
                                    <td><a><img src="<?php echo  $photo->picture_path(); ?>" height="62" width="62"></a>

                                        <div class="pictures_link">
                                            <a href="delete_photo.php?id=<?php echo $photo->id; ?>" >Delete</a>
                                            <a href="edit_photo.php?id=<?php echo $photo->id; ?>" >Edit</a>
                                            <a href="" >View</a>

                                        </div>

                                    </td>

                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->size; ?></td>

                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table> <!-End of table-->
                    </div>



                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>