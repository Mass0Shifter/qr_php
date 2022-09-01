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

class Property extends Database_object
{
    // Template Variables    

    protected static $db_table = "students";
    protected static $db_table_fields = array(
        'firstName', 'middleName', 'lastName', 'department', 'matricNumber', 'image', 'created_by_id'
    );

    public $id                      = null,
        $firstName                  = '',
        $middleName                 = '',
        $lastName                   = '',
        $department                 = '',
        $matricNumber               = null,
        $image                      = null,
        $created_by_id              = null;

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
