<?php


class Database_object{

    public static function instatiate($found_records) {

        if($found_records){
            $calling_class = get_called_class();
            $new_object                = new $calling_class;

            foreach($found_records as $property => $value){

                if($new_object->has_the_property($property)){

                    $new_object->$property = $value;

                }
            }

            return $new_object;
        }else {
            return false;
        }
    }

    private function has_the_property($property){

        $object_properties = get_object_vars($this);

        return array_key_exists($property, $object_properties);
    }

    protected function properties(){
        $properties = array();
        foreach (static::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    protected function clean_properties(){
        

        $clean_properties = array();
        foreach($this->properties() as $key=>$value){
            $clean_properties[$key] = $GLOBALS['daataabase']->escape_string($value);
        }

        return $clean_properties;
    }

    public function date_created($id){
        
        $sql = "SELECT date_created FROM " . static::$db_table . " WHERE id= $id LIMIT 1";
        $result = $GLOBALS['daataabase']->fetch_a($GLOBALS['daataabase']->query($sql));

        if(!empty($result)){
            return $result['date_created'];
        }else{
            return false;
        }
    }

    public static function find_all(){
        
        $sql = "SELECT * FROM " .static::$db_table;
        $result = self::find_this_query($sql);
        return $result;
    }

    public static function find_by_id($id){
        
        $sql = "SELECT * FROM " . static::$db_table . " WHERE id= $id LIMIT 1";
        $result = self::find_this_query($sql);

        if(!empty($result)){

            $first_item = array_shift($result);
            return $first_item;
        }else{
            return false;
        }
        
    }

    public static function find_this_query($sql){
        
        $result = $GLOBALS['daataabase']->query($sql);
        $object_array = array();

        while($row = $GLOBALS['daataabase']->fetch_a($result) ){
            $object_array[] = self::instatiate($row);
        }

        return $object_array;
    }

    public function save(){
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        

        $properties = $this->clean_properties();

        $sql = " INSERT INTO " . static::$db_table . " (" . implode(",", array_keys($properties)). ") ";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) ."')";
        if($GLOBALS['daataabase']->query($sql)){
            // $this->id = $GLOBALS['daataabase']->the_insert_id();
            // return true;
            return $this->id = $GLOBALS['daataabase']->the_insert_id();
        }else{
            return false;            
        }
    }
    
    
    public function show_all(){
        

        $properties = $this->clean_properties();
        
        $properties_pairs = array();

        foreach($properties as $key=>$value){
            $properties_pairs[] = "{$key}='{$value}'";
        }


        return $properties_pairs;
    }

    
    public function update(){
        

        $properties = $this->clean_properties();
        
        $properties_pairs = array();

        foreach($properties as $key=>$value){
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = " UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id=" . $GLOBALS['daataabase']->escape_string($this->id);

        if($GLOBALS['daataabase']->query($sql)){
            return ($GLOBALS['daataabase']->affected_rows() == 1) ? true : false;
        }else{
            return false;
        }
    }

    
    public function delete(){
        

        $sql = "DELETE FROM " . static::$db_table ;
        $sql .= " WHERE id=". $GLOBALS['daataabase']->escape_string($this->id);
        $sql .= " LIMIT 1";

        if($GLOBALS['daataabase']->query($sql)){
            return ($GLOBALS['daataabase']->affected_rows() == 1) ? true : false;
        }else{
            return false;
        }
    }

    public static function verify_id($id){
        
        $id = $GLOBALS['daataabase']->escape_string($id);
        $sql = "SELECT * FROM " . static::$db_table . " WHERE ";
        $sql .= "id= '{$id}' ";
        $sql .= "LIMIT 1";
        $result = static::find_this_query($sql);
        if(!empty($result)){

            $first_item = array_shift($result);
            if($first_item->id = $id){
                return true;
            }
           
        }else{
            return false;
        }
        
    }

}


?>