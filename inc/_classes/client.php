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

class Client extends Database_object{
    // Template Variables  

    protected static $db_table = "clients";
    protected static $db_table_fields = array(
        'first_name','middle_name','last_name','email','username','password', 
        'verified','phone_number','img_id'
    );

    public  $id                     = 0, 
            $first_name             = '',
            $middle_name            = '',
            $last_name              = '',
            $email                  = '',
            $username               = '',
            $password               = '',
            $verified                 = '',
            $phone_number           = '',
            // $date_of_birth          = null,
            $img_id                ='',
            $created_by_id          = '';


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

    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username= '{$username}' ";
        $sql .= "AND password= '{$password}' ";
        $sql .= "LIMIT 1";
        $result = self::find_this_query($sql);
        if(!empty($result)){

            $first_item = array_shift($result);
            return $first_item;
        }else{
            return false;
        }
        
    }

    public function get_image_src(){
        return PUB_IMG_PATH . "/clients/" . $this->img_id . ".jpg";
    }
}
?>