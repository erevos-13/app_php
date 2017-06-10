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
    public static function find_this_query($sql){
        global $databases;
        $rerutn_set = $databases->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($rerutn_set)){

            $the_object_array[]= self::instantation($row);

        }

        return $the_object_array;
    }


    public static function find_id($id){
        global $databases;

        /*$set_result_id =static::find_this_query("SELECT * FROM users WHERE id = $id");
        return $set_result_id;*/
        global $databases;
        $the_result_array = static::find_this_query("SELECT * FROM ".static::$db_table." ");


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




    //create a function tha detect if user exist
    public function save(){

        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->create();
        }
    }


    public function create( ){
        global $databases;

        $properties = $this->clean_properties();


        $sql = "INSERT INTO " .static::$db_table. " (";
        $sql.= implode(", " , array_keys($properties));
         $sql .= " ) VALUES  ('";
         $sql .= implode("', '", array_values($properties));
         $sql .= "')";

        if ($databases->query($sql)){
            $this->id = $databases->the_insert_id();
            return true;

        }else{
            return false;

        }
    }

    public function update(){
        global $databases;


        $properties = $this->clean_properties();

        $properties_pair = array();

        foreach ($properties as $key => $value){
            $properties_pair[] = " {$key} = ' {$value} '";
        }




        $userName = $databases->escape_string($this->username);
        $userPass = $databases->escape_string($this->password);
        $userFirst = $databases->escape_string($this->first_name);
        $userLast = $databases->escape_string($this->last_name);
        $userId = $databases->escape_string($this->id);

        $sql = "UPDATE ".static::$db_table." SET ".implode(",",$properties_pair) ." WHERE id={$userId}";

        $databases->query($sql);

        return (mysqli_affected_rows($databases->con) == 1) ? true : die;
    }

    public function delete(){
        global $databases;

        $userId =  $databases->escape_string($this->id);

        $sql = "DELETE FROM ".static::$db_table." WHERE id={$userId}";
        $databases->query($sql);

        return (mysqli_affected_rows($databases->con) == 1) ? true :false;
    }


    //this function is going to clean the
    protected function clean_properties(){
        global $databases;


        $clean_properties = array();

        foreach ($this->properties() as $key => $value){
            $clean_properties[$key] = $databases->escape_string($value);
        }

        return $clean_properties;


    }



    //i create a method so i can call it from avery were
    protected function properties(){


        $properties = array();
        foreach (static::$db_table_fields as $db_field){
            if (property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }

        }

        return $properties;

    }






}