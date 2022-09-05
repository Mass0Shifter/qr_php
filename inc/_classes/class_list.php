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

class ClassList extends Database_object
{
    // Template Variables    

    protected static $db_table = "classes";
    protected static $db_table_fields = array(
        'name', 'course_code', 'student_ids', 'lecturer_id', 'date_created'
    );

    public $id                      = null,
        $name                       = '',
        $course_code                = '',
        $student_ids                = '',
        $students                    = '',
        $lecturer_id                = '',
        $date_created               = null;

    public function __construct()
    {
    }


    public static function find_all_by_lecturer_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE lecturer_id=$id";
        $result = self::find_this_query($sql);

        if (!empty($result)) {
            foreach ($result as $re) {
                $re->get_students();
            }
            return $result;
        } else {
            return false;
        }
    }

    public function get_students()
    {
        $trimmed = str_replace(" ", "", $this->student_ids);
        $exploded = explode("," , $trimmed);
        $quoted= "";
        for ($i=0; $i < count($exploded); $i++) { 
            $matNumber = $exploded[$i];
            if($i == (count($exploded)-1)){
                $quoted .= "'$matNumber'";
            }else {
                $quoted .= "'$matNumber',";
            }
        }
        // var_dump($exploded);
        $this->students = Student::find_by_matric_numbers($quoted);
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
