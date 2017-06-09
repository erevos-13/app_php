<?php

/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 9/6/2017
 * Time: 9:31 μμ
 */
class Db_object
{
    public static function find_all(){

        return static::find_this_query("SELECT * FROM ".static::$db_table." ");



    }


    public static function find_id($id){
        global $databases;

        /*$set_result_id =self::find_this_query("SELECT * FROM users WHERE id = $id");
        return $set_result_id;*/
        global $databases;
        $the_result_array = static::find_this_query("SELECT * FROM ".self::$db_table." ");


        return !empty($the_result_array)? array_shift($the_result_array):false;







    }



    public static function instantation($result_user){

        $calling_class = get_called_class();

        $the_object = new $calling_class;

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