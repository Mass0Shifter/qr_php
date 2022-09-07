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

class Attendances extends Database_object
{
    // Template Variables    

    protected static $db_table = "attendances";
    protected static $db_table_fields = array(
        'attendance_list_id', 'student_id', 'student_matric', 'time_record'
    );

    public $id                      = null,
        $attendance_list_id         = '',
        $student_id                 = '',
        $student_matric                 = '',
        $student                    = '',
        $time_record                = null;

    public function __construct()
    {
    }

    public function get_student()
    {
        $this->student = Student::find_by_id($this->student_id);
    }

    public static function get_all_attendances_for_id($id)
    {
        
        $sql = "SELECT * FROM " . static::$db_table . " WHERE attendance_list_id=$id ORDER BY time_record ASC";
        $result = self::find_this_query($sql);

        if (!empty($result)) {
            foreach ($result as $re) {
                $re->get_student();
            }
            return $result;
        } else {
            return false;
        }
    }

    public static function count_for_id($id)
    {
        
        $sql = "SELECT * FROM " . static::$db_table . " WHERE uploaded_by_id=$id AND rejected=0";
        $result = self::find_this_query($sql);
        if (!empty($result)) {
            return count($result);
        } else {
            return "None";
        }
    }
}
