<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 16/6/2017
 * Time: 9:35 μμ
 */
 include("includes/header.php");
 if (!$session->is_signed_in()) { redirect("login.php");  }


$user = new Users();

       if (isset($_POST['create'])){


          if ($user){
              $user->username =  $_POST['username'];
              $user->password =  $_POST['password'];
              $user->first_name =  $_POST['first_name'];
              $user->last_name = $_POST['last_name'];

              $user->set_files($_FILES['user_image']);
              $user->save_photo_user();
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
            <div class="col-lg-6 col-md-offset-3">
                <h1 class="page-header">
                    User
                    <small>add</small>
                </h1>

                <!- form tag -->
                <!--when i do not put the action is like i say that is in this file.-->
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">

                        <input type="file" name="user_image" >

                    </div>

                    <div class="form-group">
                        <label for="username" >Username</label>
                        <input type="text" name="username" class="form-control"  >

                    </div>



                    <div class="form-group">
                        <label for="password" >Password</label>
                        <input type="password" name="password" class="form-control" >

                    </div>

                    <div class="form-group">
                        <label for="first_name" >First Name</label>
                        <input type="text" name="first_name" class="form-control" >

                    </div>

                    <div class="form-group">
                        <label for="last_name" >last Name</label>
                        <input type="text" name="last_name" class="form-control" >

                    </div>
                    <div class="info-box-update pull-right ">
                        <input type="submit" name="create"  class="btn btn-primary btn-lg ">
                    </div>
            </div>


            <!-- row -->


            </form>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>