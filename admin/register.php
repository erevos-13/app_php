<?php include("includes/header.php"); ?>



<?php



$user = new Users();

if(isset($_POST['register'])) {

    $user_found = Users::verify_user( $_POST['username'] , $_POST['password']);
    if(!$user_found) {


        $user->username = $_POST['username'];
        $user->first_name =$_POST['first_name'];
        $user->last_name =$_POST['last_name'];
        $user->password =$_POST['password'];


        $user->save();
        redirect("../index.php");


    }else{
        $the_message = 'There is there a user all ready';
    }





}else{
    $username = '';
    $password = '';
    $the_message = "";
}




?>


<div class="col-md-4 col-md-offset-3 " style="color: white;">

    <h4 class="bg-danger"><?php echo $the_message; ?></h4>

    <h4>You can register here:</h4>

    <form id="login-id" action="" method="post">
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


        <div class="form-group">
            <input type="submit" name="register" value="Register" class="btn btn-primary">

        </div>
        <div class="form-group">
            <a href="login.php" class="btn btn-success"> Return to Login</a>
        </div>




    </form>


</div>