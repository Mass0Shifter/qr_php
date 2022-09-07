<?php
    require_once('db_credentials.php');

    class Database {
        public $connection;

        function __construct()
        {
            $this->connect();
        }
       
        public function connect(){
            $this->connection =  mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);            
            $this->confirm_db_connect();
        }
        
        function disconnect(){
            if(isset($this->connection)){
                mysqli_close($this->connection);
            }   
        }

        public function query($sql = ''){
            if(isset($this->connection)){
                $result_set = mysqli_query($this->connection, $sql);
                $this->confirm_db_result($result_set);
                // echo $this->get_error();
                return $result_set;                              
            }
            
        }

        function fetch_a($result_set){
            if(isset($result_set)){
                if(gettype($result_set) == "boolean"){
                    return;
                }
                return mysqli_fetch_assoc($result_set);
            }
        }

        private function free($result_set){
            if(isset($result_set)){
                mysqli_free_result($result_set);
            }
        }

        private function confirm_db_connect(){
            if(mysqli_connect_errno()){
                $msg = "Database connection failed: ";
                $msg .= mysqli_connect_error();
                $msg .= " (" . mysqli_connect_errno() . ")";
                exit($msg);
            }
        }

        private function confirm_db_result($result_set){
            if(!isset($result_set)){
                exit("Database Query Failed");
            }
        }

        public function escape_string($string){

           $esc_string = mysqli_real_escape_string($this->connection, $string);
           return $esc_string;
        }

        public function the_insert_id(){
            return mysqli_insert_id($this->connection);
        }
        
        public function affected_rows(){
            return mysqli_affected_rows($this->connection);
        }
        
        
        public function get_error(){
            return mysqli_error($this->connection);
        }
        
         

    }

    $GLOBALS['daataabase'] = new Database();
    
?>