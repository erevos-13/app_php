<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 30/5/2017
 * Time: 11:59 μμ
 */



class Database{

    public $con;

    /**
     * Database constructor.
     */
    function __construct()
    {
        $this->open_db_conection();
    }

    public function open_db_conection(){

        //$this->con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        $this->con = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if ($this->con->connect_errno){
            die("Databases is fail to load". $this->con->connect_error);
        }

    }


    public function query($sql){

        $result = $this->con->query($sql);

        $this->confirm_query($result);


        return $result;
    }

    private function confirm_query($result){

        if (!$result){
            die("Query failed". $this->con->error );
        }
    }

    public function escape_string($string){

       $escaped_string = mysqli_real_escape_string($this->con,$string);
       return $escaped_string;
    }

    public function the_insert_id(){

        return mysqli_insert_id($this->con);

    }






} //end of class Databases


$databases = new Database();

