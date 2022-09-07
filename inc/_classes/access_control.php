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

class AccessControl extends Database_object{
    // Template Variables  

    protected static $db_table = "access_control";
    protected static $db_table_fields = array(
        'page_name','list_type','user_id_list','last_edited_by_id','last_user_id_list','created_by_id'
    );

    public  $id                             =  null, 
            $page_name                      = '',
            $list_type                      = '',
            $user_id_list                   = null,
            $last_edited_by_id              = 0,
            $last_user_id_list              = null,
            // $user_list                      = null,
            $created_by_id                  = '';
            
            
    public function __construct()
    {
        //$this->get_users();
    }

    public static function find_by_page_name($name){
        
        $sql = "SELECT * FROM " . static::$db_table . " WHERE page_name='$name' LIMIT 1";
        $result = self::find_this_query($sql);

        if(!empty($result)){
            $first_item = array_shift($result);
            return $first_item;
        }else{
            return false;
        }
        
    }

    
    public function confirm_user_access($user_id){
        $user_ids = explode( "," , $this->user_id_list );

        $user_found = false;
        
        for($x = 0; $x < count($user_ids) ; $x++){
            if($user_ids[$x] == $user_id){
                $user_found = true;
                break;
            }
        }

        if($this->list_type == "whitelist"){
            if($user_found){
                return true;
            }else{
                return false;
            }
        }else if($this->list_type == "blacklist"){
            if($user_found){
                return false;
            }else{
                return true;
            }
        }
        
    }
    
}


?>