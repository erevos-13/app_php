
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>

            <?php
            //i call the class
            // here is if i would like to instasiet
            // $user = new Users();

            /*$result_set = Users::find_all_users();

            while($row = mysqli_fetch_array($result_set)){

                echo $row['username']. "<br>";

            }*/


            /*$result_id = Users::find_id_users(1);
            $row = mysqli_fetch_array($result_id);
            $user = Users::instantation($row);
            echo $user->password;*/

            /*$users = Users::find_all_users();

            foreach ($users as $user){
                echo $user->username;
            }


            */?>

            <?php

            $result_id = Users::find_id_users(1);
            echo  $result_id->username;
            print_r($_SESSION);

            ?>


            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="../index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->