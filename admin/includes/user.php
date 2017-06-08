<?php
/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 31/5/2017
 * Time: 7:08 μμ
 */


class Users  {
    //i make aprotected statid var for the table in databases
    protected static   $db_table = "users";
    //here i make a var array so i can call an array for every fild
    protected static   $db_table_filds = array('username', 'password', 'first_name', 'last_name');
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

        /*$set_result_id =self::find_this_query("SELECT * FROM users WHERE id = $id");
        return $set_result_id;*/
        global $databases;
        $the_result_array = self::find_this_query("SELECT * FROM users");

        return !empty($the_result_array)? array_shift($the_result_array):false;







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

    public static function verify_user($username , $password){
        global $databases;

        $username = $databases->escape_string($username);
        $password = $databases->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1 ";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array)? array_shift($the_result_array):false;




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

    //i create a method so i can call it from avery were
    protected function properties(){


        $properties = array();
        foreach (self::$db_table_filds as $db_field){
            if (property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }

        }

        return $properties;

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

        $properties = $this->properties();

        //values for users
        $userName = $databases->escape_string($this->username);
        $userPass = $databases->escape_string($this->password);
        $userFisrt = $databases->escape_string($this->first_name);
        $usersLast = $databases->escape_string($this->last_name);

        $sql = "INSERT INTO ".self::$db_table." (". implode("," , array_keys($properties))         .")";
        $sql .= "VALUES ('".

            implode("','", array_values($properties))

            ."')";

        if ($databases->query($sql)){
            $this->id = $databases->the_insert_id();
            return true;

        }else{
            return false;

        }
    }

    public function update(){
        global $databases;

        $userName = $databases->escape_string($this->username);
        $userPass = $databases->escape_string($this->password);
        $userFirst = $databases->escape_string($this->first_name);
        $userLast = $databases->escape_string($this->last_name);
        $userId = $databases->escape_string($this->id);

        $sql = "UPDATE ".self::$db_table." SET username='{$userName}', password='{$userPass}' ,first_name='{$userFirst}',last_name='{$userLast}' WHERE id={$userId}";

        $databases->query($sql);

        return (mysqli_affected_rows($databases->con) == 1) ? true : die;
    }

    public function delete(){
        global $databases;

        $userId =  $databases->escape_string($this->id);

        $sql = "DELETE FROM ".self::$db_table." WHERE id={$userId}";
        $databases->query($sql);

        return (mysqli_affected_rows($databases->con) == 1) ? true :false;
    }









} //end of users class