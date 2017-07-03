<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 3/7/2017
 * Time: 5:26 μμ
 */
include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php");  } ?>

<?php

$userId = Users::find_by_id($_GET['id']);



?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <?php include("includes/top_nav.php") ?>


        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row top-buffer">
                <div class="col-lg-12 ">
                    <h1 class="page-header">
                        User Profile</h1>

                    <div class="col-md-6">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name </th>
                                <th>First Name</th>
                                <th>Last Name</th>


                            </tr>
                            </thead>
                            <tbody>




                                <tr>
                                    <td><?php echo $userId->id;?></td>


                                    <td><?php echo $userId->username; ?></td>
                                    <td><?php echo $userId->first_name; ?></td>
                                    <td><?php echo $userId->last_name; ?></td>



                                </tr>

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


