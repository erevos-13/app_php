<?php require_once "includes/header.php";?>
<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 2/6/2017
 * Time: 11:48 μμ
 * login page for my app
 */
if ($session->is_signed_in()){
    redirect("index.php");
    exit();
}


if (isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password =  trim($_POST['password']);

    //method to check databases user
    //because is
    $user_found = Users::verify_user( $username , $password);


   //method to see if found user
    if ($user_found){
        $session->login($user_found);
        redirect('index.php');

    }else{
        $the_message = "your password or username is incorect";
    }

}else{
    $username = '';
    $password = '';
    $the_message = "";
}

?>

<div class="col-md-4 col-md-offset-3" style="color: white;">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>

<form id="login-id" action="login.php" method="post">

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>" >

    </div>


    <div class="form-group">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

    </div>
    <div class="form-group">
        <a href="register.php" class="btn btn-success">Register</a>
    </div>


</form>


</div>