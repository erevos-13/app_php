<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 31/5/2017
 * Time: 7:08 μμ
 */


class Users  {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;



    /**
     * @return mixed
     */
    public static function find_all_users(){

        return self::find_this_query("SELECT * FROM users");



    }


    public static function find_id_users($id){
        global $databases;

        $set_result_id =self::find_this_query("SELECT * FROM users WHERE id = $id");
        return $set_result_id;




    }


    public static function find_this_query($sql){
        global $databases;
        $rerutn_set = $databases->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($rerutn_set)){

            $the_object_array[]= self::instantation($row);

        }

        return $the_object_array;
    }



    public static function instantation($result_user){

        $the_object = new self;

/*        $the_object->id = $result_user['id'];
        $the_object->username = $result_user['username'];
        $the_object->password = $result_user['password'];
        $the_object->first_name = $result_user['first_name'];
        $the_object->last_name = $result_user['last_name'];*/

        foreach ($result_user as $the_attribute => $value){

            if ($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }


        return $the_object;
    }


    private function has_the_attribute($the_attribute){

       $object_properties = get_object_vars($this);
       return array_key_exists($the_attribute, $object_properties);

    }








}