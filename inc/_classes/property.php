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

class Property extends Database_object
{
    // Template Variables  

    protected static $db_table = "properties";
    protected static $db_table_fields = array(
        'property_name', 'facility_type', 'offer_type', 'facility_condition', 'property_price', 'rooms',
        'floors', 'bathrooms', 'balcony', 'borehole', 'gym', 'swimpool',
        'parkinglot', 'ac', 'wordrobe', 'doc_excision', 'doc_gasette', 'doc_coo',
        'doc_doa', 'doc_gc', 'doc_lr', 'doc_sp', 'doc_dwg', 'doc_fp',
        'img_1', 'img_2', 'img_3', 'approved', 'rejected', 'created_by_id'
    );

    public $id                          = null,
        $property_name                  = '',
        $facility_type                  = '',
        $offer_type                     = '',
        $facility_condition             = '',
        $property_price                 = null,
        $rooms                          = null,
        $floors                         = null,
        $bathrooms                      = null,
        $balcony                        = null,
        $borehole                       = null,
        $gym                            = null,
        $swimpool                       = null,
        $parkinglot                     = null,
        $ac                             = null,
        $wordrobe                       = null,
        $doc_excision                   = null,
        $doc_gasette                    = null,
        $doc_coo                        = null,
        $doc_doa                        = null,
        $doc_gc                         = null,
        $doc_lr                         = null,
        $doc_sp                         = null,
        $doc_dwg                        = null,
        $doc_fp                         = null,
        $img_1                          = null,
        $img_2                          = null,
        $img_3                          = null,
        $approved                       = true,
        $rejected                       = false,
        $created_by_id                  = null;

    public function __construct()
    {
    }

    public function get_site()
    {
        $this->site = Site::find_by_id($this->site_id);
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
