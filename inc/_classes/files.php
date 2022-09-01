<?php
/**
 * Basic class used for storing template options and providing
 * various helper functions for populating the template with
 * random content
 *
 * @author Zero
 *
 */
$root_to_path = join(DIRECTORY_SEPARATOR, array($_SERVER['DOCUMENT_ROOT'], 'luzcasa-admin', 'inc', 'initialize.php'));
require_once($root_to_path);

class LuzFile extends Database_object{
    // Template Variables  

    protected static $db_table = "files_uploads";
    protected static $db_table_fields = array(
        'belongs_to','file_type','src', 'date_uploaded'
    );

    public  $id                     = 0, 
            $belongs_to             = '',
            $file_type              = '',
            $src                    = '',
            $date_uploaded          = '';


    public function fullName() {
        return $this->first_name ." " . $this->middle_name ." " .$this->last_name;
    }

    public function __construct()
    {
        
    }

    private function has_the_property($property){

        $object_properties = get_object_vars($this);

        return array_key_exists($property, $object_properties);
    }

    protected function properties(){
        $properties = array();
        foreach (self::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    protected function clean_properties(){
        global $database;

        $clean_properties = array();
        foreach($this->properties() as $key=>$value){
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }   
    
}
?>