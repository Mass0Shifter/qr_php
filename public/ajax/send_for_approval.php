<?php require_once('../../inc/initialize.php');

    if(isset($_POST['why'])){

        $date = $_POST['date'];
        $purpose = $_POST['why'];
        $type =  $_POST['type'];
        $place_holder_id =  $_POST['place_holder_id'];
        $staff_id = $_SESSION['user_id'];
        $stage = 1;
        $stage_stamps = 1;
        $date_array = $_POST['weekSelection'];
        $is_week = $_POST['is_week'];
        
        $rv = stripos($date,"FROM");

        if($rv === 0){
            $is_ranged = true;
        }else{
            $is_ranged = false;
        }
        
        if($is_ranged){
            $is_week = true;
        }
        
        if($is_week === true){
            // print_r($date_array[0]);
            $week_id = uniqid ("week");
            echo "$is_week : Week Request Created.";
            foreach($date_array as $date_s){
                $LD = new LeaveDates();
                $LD->staff_id           = $staff_id;
                $LD->date_picked        = $date_s;
                $LD->stage              = $stage;
                $LD->purpose            = $purpose;
                $LD->type               = $type;
                $LD->place_holder_id    = $place_holder_id;
                $LD->is_week            = true;
                $LD->is_week_id         = $week_id;
                $LD->week_range         = "FROM " . $date_array[0] . " TO " . $date_array[4];
                
                
                $LC = LeaveConfig::find_by_staff_id($LD->staff_id);
                if($LC->total_leaves == $LC->used_leaves){
                    echo "Total leaves exceeded.";
                    return;
                }
                
                $LD->save();
                
                // echo  "[".$LD->end_date."]";
                echo  "<br>{".$database->get_error()."}";
            }
            
        }else{
            echo "$is_week : Day Selection Sent.";
            $LD = new LeaveDates();

            $LD->staff_id           = $staff_id;
            $LD->date_picked        = $date;
            $LD->stage              = $stage;
            $LD->purpose            = $purpose;
            $LD->type               = $type;
            $LD->is_week            = 0;
            $LD->place_holder_id    = $place_holder_id;
            
            $LC = LeaveConfig::find_by_staff_id($LD->staff_id);
            if($LC->total_leaves == $LC->used_leaves){
                echo "Total leaves exceeded.";
                return;
            }
            
            $LD->save();
            
            // echo  "[".$LD->end_date."]";
            echo  "<br>{".$database->get_error()."}";
        }
        
        
        echo "<br>Leave Date Saved";
    }else{
        echo "NOTING TO SEE HERE";
    }

?>