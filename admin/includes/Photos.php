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
    protected static   $db_table = "photos";
    //here i make a var array so i can call an array for every field
    protected static   $db_table_fields = array('title', 'description','filename', 'type', 'size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmp_path;
    public $upload_directory = "images";
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

    public function set_files($file){



        //error check
        if (empty($file) || !$file || !is_array($file)){
            $this->error[] = "There was no file uploaded here";
            return false;
        }elseif ($file['error'] != 0){
            $this->error[] = $this->upload_error[$file['error']];
            return false;
        }else{
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }



    }



}