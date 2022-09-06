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

class Attendance extends Database_object
{
    // Template Variables    

    protected static $db_table = "attendance";
    protected static $db_table_fields = array(
        'class_id', 'class_count', 'date'
    );

    public $id                      = null,
        $class_id                   = '',
        $class                      = '',
        $class_count                = '',
        $attendances                = '',
        $date                       = null;

    public function __construct()
    {
    }

    public static function find_by_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE id= $id LIMIT 1";
        $result = self::find_this_query($sql);

        if (!empty($result)) {

            $first_item = array_shift($result);
            $first_item->get_attendances();
            $first_item->get_class();
            return $first_item;
        } else {
            return false;
        }
    }

    public static function find_by_class_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE class_id= $id LIMIT 1";
        $result = self::find_this_query($sql);

        if (!empty($result)) {

            $first_item = array_shift($result);
            $first_item->get_attendances();
            $first_item->get_class();
            return $first_item;
        } else {
            return false;
        }
    }

    public static function find_all_by_class_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE class_id=$id";
        $result = self::find_this_query($sql);

        if (!empty($result)) {

            foreach ($result as $re) {

                $re->get_attendances();
                $re->get_class();
            }
            return $result;
        } else {
            return false;
        }
    }


    public function get_attendances()
    {
        $this->attendances = Attendances::get_all_attendances_for_id($this->id);
    }
    public function get_class()
    {
        $this->class = ClassList::find_by_id($this->class_id);
    }

    public static function find_all()
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table;
        $result = self::find_this_query($sql);
        foreach ($result as $at) {
            $at->get_attendances();
            $at->get_class();
        }
        return $result;
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
