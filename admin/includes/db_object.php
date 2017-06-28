<?php

/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 9/6/2017
 * Time: 9:31 μμ
 */
class Db_object
{
    public $error = array();
    public $upload_error = array(

        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The upload file exceeds the upload_max_filesize",
        UPLOAD_ERR_FORM_SIZE => "The file exceeds the max_file_size directive",
        UPLOAD_ERR_PARTIAL => "The upload file was only partialy uploaded",
        UPLOAD_ERR_NO_FILE => "No file was upload",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A php extension stopped the file upload"

    );









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
        $the_result_array = static::find_this_query("SELECT * FROM ".static::$db_table." WHERE id={$id}");


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


    public function create(){
        global $databases;

        $properties = $this->clean_properties();
        $sql = "INSERT INTO ". static::$db_table. " (".implode(", " , array_keys($properties))." ) VALUES  ('".implode("', '", array_values($properties))."')";


       /* $sql = "INSERT INTO ". static::$db_table. " ( ";
        $sql.= implode(", " , array_keys($properties));
         $sql .= " ) VALUES  ('";
         $sql .= implode("', '", array_values($properties));
         $sql .= "')";*/

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


        $userId = $databases->escape_string($this->id);

        $sql = "UPDATE ".static::$db_table." SET ".implode(", ",$properties_pair) ." WHERE id={$userId}";

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

    public static function count_all(){
        global $databases;

        $sql= "SELECT COUNT(*) FROM ".static::$db_table;
        $result_set = $databases->query($sql);
        $row = mysqli_fetch_array($result_set);

        //so to take only the number i need to take tha firsth
        return array_shift($row);


    }






    public function delete_photo() {


        if($this->delete()) {

            $target_path = SITE_ROOT.orfeas. 'admin' . orfeas . $this->picture_path();

            return unlink($target_path) ? true : false;


        } else {

            return false;


        }




    }








}