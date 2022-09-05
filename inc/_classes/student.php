<?php

/**
 * Basic class used for storing template options and providing
 * various helper functions for populating the template with
 * random content
 *
 * @author Zero
 *
 */
$root_to_path = join(DIRECTORY_SEPARATOR, array($_SERVER['DOCUMENT_ROOT'], 'qr_php', 'inc', 'initialize.php'));
require_once($root_to_path);

class Student extends Database_object
{
    // Template Variables    

    protected static $db_table = "students";
    protected static $db_table_fields = array(
        'first_name', 'middle_name', 'last_name', 'department', 'matric_number', 'img_src', 'date_created'
    );

    public $id                      = null,
        $first_name                  = '',
        $middle_name                 = '',
        $last_name                   = '',
        $department                 = '',
        $matric_number               = null,
        $img_src                      = null,
        // $created_by_id                      = null,
        $date_created              = null;

    public function __construct()
    {
    }


    public static function find_all_by_user_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE uploaded_by_id=$id";
        $result = self::find_this_query($sql);

        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }

    public static function find_by_matric_number($mat){
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE matric_number='$mat' LIMIT 1";
        $result = self::find_this_query($sql);

        if(!empty($result)){

            $first_item = array_shift($result);
            return $first_item;
        }else{
            return false;
        }
        
    }
    public static function find_by_matric_numbers($mats){
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE matric_number IN ($mats)";
        var_dump($sql);
        // $sql = "SELECT * FROM " . static::$db_table . " WHERE matric_number='$mats' LIMIT 1";
        $result = self::find_this_query($sql);

        if(!empty($result)){

            $first_item = array_shift($result);
            return $first_item;
        }else{
            return false;
        }
        
    }

    public static function count_for_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE uploaded_by_id=$id AND rejected=0";
        $result = self::find_this_query($sql);
        if (!empty($result)) {
           return count($result);
        } else {
            return "None";
        }
    }

    
}
