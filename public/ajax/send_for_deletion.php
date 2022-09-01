<?php require_once('../../inc/initialize.php');

    if(isset($_POST['why'])){


        $date = $_POST['date'];
        $purpose = $_POST['why'];
        $staff_id = $_SESSION['user_id'];
        
        $rv = stripos($date,"FROM");

        if($rv === 0){
            $is_ranged = true;
        }else{
            $is_ranged = false;
        }
        
        if($is_ranged){
            
            $dates = LeaveDates::find_dates_by_range($staff_id, $date);
            
            foreach($dates as $LD){
                $LD->removed = 1;
        
                $LD->update();
            }
            
        }else{
            
            $LD = LeaveDates::find_by_date($staff_id, $date);
            
            $LD->removed = 1;
    
            $LD->update();
            
        }
        
    }
    
?>