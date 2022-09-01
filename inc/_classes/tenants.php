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

class Tenants extends Database_object
{
    // Template Variables  

    protected static $db_table = "tenants";
    protected static $db_table_fields = array(
        'client_id', 'property_id', 'user_id', 'rental_rate'
    );

    public $id                      = null,
        $client_id                  = '',
        $client                     = '',
        $property_id                = '',
        $user_id                    = '',
        $property                   = '',
        $rental_rate                = 0;

    public function __construct()
    {
    }

    public function get_client()
    {
        $this->client = Client::find_by_id($this->client_id);
    }

    public function get_property()
    {
        $this->property = Property::find_by_id($this->property_id);
    }

    public static function find_all_by_user_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE user_id=$id";
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
        $sql = "SELECT * FROM " . static::$db_table . " WHERE user_id=$id AND active=1";
        $result = self::find_this_query($sql);
        if (!empty($result)) {
            return count($result);
        } else {
            return "None";
        }
    }

    public static function earnings_for_id($id)
    {
        global $database;
        $sql = "SELECT * FROM " . static::$db_table . " WHERE user_id=$id";
        $result = self::find_this_query($sql);
        if (!empty($result)) {
            $earning = 0;
            foreach ($result as $rent) {
                $earning += $rent->rental_rate;
            }
            return $earning;
        } else {
            return 0;
        }
    }
}
