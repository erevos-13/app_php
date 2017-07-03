<?php

/**
 * Created by PhpStorm.
 * User: erevos13
 * Date: 10/6/2017
 * Time: 12:11 πμ
 */
class Photos extends Db_object
{
    //i make a protected static var for the table in databases
    protected static $db_table = "photos";
    //here i make a var array so i can call an array for every field
    protected static $db_table_fields = array('title', 'caption', 'description', 'filename', 'alternate_text', 'type', 'size','date');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;
    public $name;
    public $date;
    public $tmp_name;
    public $tmp_path;
    public $upload_directory = "image";
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


    //This is passing $FILES['uploaded_file'] as an argument

    public function set_file($file) {

        if(empty($file) || !$file || !is_array($file)) {
            $this->error[] = "There was no file uploaded here";
            return false;

        }elseif($file['error'] !=0) {

            $this->error[] = $this->upload_error[$file['error']];
            return false;

        } else {


            $this->filename =  basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];


        }



    }


    //make a path for the picture do if i change the path is no break
    public function picture_path()
    {
        return "includes/image/".$this->filename;

    }


    public function save()
    {

        if ($this->id) {

            $this->update();

        } else {

            if (!empty($this->error)) {

                return false;
            }

            if (empty($this->filename) || empty($this->tmp_path)) {
                $this->error[] = "the file was available";
                return false;
            }


            $target_path = "/var/www/html/udemy/app_php/admin/includes/image/".$this->filename;

            if (file_exists($target_path)) {
                $this->error[] = "The file {$this->filename} already exist";
                return false;
            }

            if(move_uploaded_file($this->tmp_path, $target_path)) {

                if(	$this->create()) {

                    unset($this->tmp_path);
                    return true;

                }



            } else {
                $this->error[] = "the folder is not have permission";
                return false;
            }


        }
    }

    public function delete_photo()
    {
        if ($this->delete()) {
            $target_path = SITE_ROOT . orfeas . 'admin' . orfeas .'includes'.orfeas.'image'.orfeas. $this->filename;
            return unlink($target_path) ? true : false;


        } else {
            return false;
        }


    }

    public function comments() {


        return Comment::find_the_comment($this->id);


    }


 public static function display_sidebar_data($photo_id){

        $photo = Photos::find_id($photo_id);

        /*$output = "<a class='thumbnail' href='#'><img width='100' scr='{$photo->pictere_path()}' ></a>";
        $output .="<p>{$photo->filename}</p>";
        $output .= "<p>{$photo->type}</p>";
        $output .= "<p>{$photo->size}</p>";*/
     $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}' ></a> ";
     $output .= "<p>{$photo->filename}</p>";
     $output .= "<p>{$photo->type}</p>";
     $output .= "<p>{$photo->size}</p>";
     $output .= "<p>{$photo->date}</p>";
        echo $output;

 }




}//End Of Class