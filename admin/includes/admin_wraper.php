
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


            */

           $id = Photos::find_id(2);
           echo  $id->size;

            /*$user = new Users();

            $user->username = "maria";
            $user->password = "erevos13";
            $user->first_name = "mairy";
            $user->last_name = "arvaniti";

            $user->create();*/

            /*//i have to call first the user id
            $user = Users::find_id_users(6);
            $user->delete();*/


           /* $user = new Users();
            $user->username = "voutsaridis";

            $user->save();*/
/*
            $photos = Photos::find_all();
            foreach ($photos as $photo){
                echo $photo->title;

            }*/

           /* $photos = new Photos();
            $photos->size = 20;
            $photos->create();*/

//            echo INCLUDES_PATH;

            /* $photos = new Photos();
            $photos->size = 50;
            $photos->save();*/




           /* $user = new Users();
            $user->id = 3;
            $user->last_name = "arvaniti";

            //then i call the update method or delete
            $user->save();*/

            /*$user = Users::find_all();
            foreach ($user as $user){
                echo "The user name is: ".$user->username;
                echo " The password is: ".$user->password."<br>";
            }*/


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

