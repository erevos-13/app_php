<?php include("includes/header.php"); ?>
<?php include "includes/modal.php"; ?>


<?php if (!$session->is_signed_in()) { redirect("login.php");  } ?>

<?php
 if (empty($_GET['id'])){
     redirect("users.php");
 }


$user = Users::find_id($_GET['id']);

     if (isset($_POST['update'])) {




         if ($user) {
             $user->username = $_POST['username'];
             $user->password = $_POST['password'];
             $user->first_name = $_POST['first_name'];
             $user->last_name = $_POST['last_name'];


             if(empty($_FILES['user_image'])){


                 $user->save();
                 redirect("users.php");
             }else{

                 $user->set_files($_FILES['user_image']);
                 $user->save_photo_user();
                 $user->save();

                 redirect("users.php");




             }


         }


     }










?>






    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" xmlns="http://www.w3.org/1999/html">
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
                <div class="col-lg-12 ">
                    <h1 class="page-header">
                        User
                        <small>edit</small>
                    </h1>




                    <!- form tag -->
                    <!--when i do not put the action is like i say that is in this file.-->
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-6">
                            <a href="#" data-toggle="modal" data-target="#photo-modal" ><img class="img-responsive" src="<?php echo $user->image_path_placeholder(); ?>" alt=""></a>
                        </div>




                        <div class="col-md-6">

                            <div class="form-group">

                                <input type="file" name="user_image" >

                            </div>


                        <div class="form-group">
                            <label for="username" >Username</label>
                            <input type="text" name="username" class="form-control"  value="<?php echo $user->username;?>">

                        </div>



                        <div class="form-group">
                            <label for="password" >Password</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>" >

                        </div>

                        <div class="form-group">
                            <label for="first_name" >First Name</label>
                            <input type="text" name="first_name" class="form-control"  value="<?php echo  $user->first_name; ?>" >

                        </div>

                        <div class="form-group">
                            <label for="last_name" >last Name</label>
                            <input type="text" name="last_name" class="form-control"  value="<?php echo  $user->last_name; ?>" >

                        </div>
                        <div class="form-group pull-right ">
                            <button class="btn btn-danger btn-lg " >
                                <a id="user-id" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a></button>

                            <input type="submit" name="update"  class="btn btn-primary btn-lg "  value="Update">
                        </div>




                </div>


                <!-- row -->


                </form>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>