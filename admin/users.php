<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");  } ?>

<?php
$users = Users::find_all();






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
                        users
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($users as $user) : ?>


                                <tr>
                                    <td><?php echo $user->id;?></td>
                                    <td><a><img class="admin-photo-thumbnail" src="<?php echo  $user->user_image; ?>" ></a></td>

                                    <td><?php echo $user->username; ?>
                                        <div class="actions_link">
                                            <a href="delete_photo.php?id=<?php echo $user->id; ?>" >Delete</a>
                                            <a href="edit_photo.php?id=<?php echo $user->id; ?>" >Edit</a>
                                            <a href="" >View</a>

                                        </div>
                                    </td>
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->last_name; ?></td>

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