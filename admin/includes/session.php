<?php


class Session {
    /*the session i would like to use every time open the app */


    private $signed_in = false;
    public $user_id; //use the id for do thinks
    public $message;

    //every time i run the app is running this
    function __construct()
    {
        session_start();
        $this->check_the_login();
        $this->check_message();
    }

    //getter method is the method to call the private
    public function is_signed_in(){
        return $this->signed_in;
    }

    //check if the user is there in databases
    public function login($user){

        if ($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }

    }

    //method to logout unset all the method
    public function logout(){

        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }


    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            //apply the value in user_id
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        }else{
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function message($msg=""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }else{
            return $this->message;
        }
    }

    private function check_message(){
        if (isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }
    }




}

$session = new Session();

