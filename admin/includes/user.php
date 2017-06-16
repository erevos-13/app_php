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
    protected static   $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $tmp_path;
    public $size;
    public $type;
    public $upload_dir = 'includes/image';
    public $image_placehoder = 'http://via.placeholder.com/62x62' ;
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




    /* set file method */
    public function set_files($file){



        //error check
        if (empty($file) || !$file || !is_array($file)){
            $this->error[] = "There was no file uploaded here";
            return false;
        }elseif ($file['error'] != 0){
            $this->error[] = $this->upload_error[$file['error']];
            return false;
        }else{
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }



    }

    public function save_photo_user(){

        if ($this->id){

            $this->update();

        }else{

            if (!empty($this->error)){

                return false;
            }

            if (empty($this->user_image) || empty($this->tmp_path)){
                $this->error[] = "the file was available";
                return false;
            }

            //$target_path = SITE_ROOT.orfeas.'admin'.orfeas.$this->upload_directory.orfeas.$this->user_image;
            $target_path = "/var/www/html/udemy/app_php/admin/includes/image/".$this->user_image;
            if (file_exists($target_path)){
                $this->error[] = "The file {$this->user_image} already exist";
                return false;
            }

            if ( move_uploaded_file($this->tmp_path ,$target_path)){
                if ($this->tmp_path){
                    unset($this->tmp_path);
                    $this->create();
                    return true;
                }
            }else{
                $this->error[] = "the folder is not have permission";
                return false;
            }


        }
    }


    public function image_path_placeholder(){
        return empty($this->user_image) ? $this->image_placehoder : $this->upload_dir.orfeas.$this->user_image ;
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