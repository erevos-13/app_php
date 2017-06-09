<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 31/5/2017
 * Time: 7:08 μμ
 */


class Users extends Db_object {
    //i make aprotected statid var for the table in databases
    protected static   $db_table = "users";
    //here i make a var array so i can call an array for every fild
    protected static   $db_table_filds = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;







    public static function find_this_query($sql){
        global $databases;
        $rerutn_set = $databases->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($rerutn_set)){

            $the_object_array[]= self::instantation($row);

        }

        return $the_object_array;
    }

    public static function verify_user($username , $password){
        global $databases;

        $username = $databases->escape_string($username);
        $password = $databases->escape_string($password);

        $sql = "SELECT * FROM ".self::$db_table." WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1 ";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array)? array_shift($the_result_array):false;




    }



















} //end of users class