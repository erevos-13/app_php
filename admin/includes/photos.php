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
    protected static   $db_table_filds = array('photo_id', 'title', 'description','filename', 'type', 'size');
    public $photo_id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;



}