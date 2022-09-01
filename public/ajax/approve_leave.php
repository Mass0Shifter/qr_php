<?php require_once('../../inc/initialize.php');


    if(isset($_POST['date_id'])){

        
        //echo $_POST['date_id'];

        $LD = LeaveDates::find_by_id($_POST['date_id']);
        
        $process = ChainOfCommand::find_by_staff_id($LD->staff_id); 
        
        $LC = LeaveConfig::find_by_staff_id($LD->staff_id);
        
            $process_found = false;
            
            if($process){
                $process_found = true;
                $process->find_all_things();                
            }
            
        if($LD->is_week){
            
            $leave_dates = LeaveDates::find_by_week_id($LD->is_week_id, $LD->staff_id);
            foreach($leave_dates as $LD){
                
                if(empty($LD->stage_stamps)){
                
                $LD->stage_stamps   = $_SESSION['user_id'];
                
                }else{
                    
                    $LD->stage_stamps   .= "," . $_SESSION['user_id'];
                    
                }
                
                
                if($LD->stage_stamps == $process->chain_staff_id){
                    
                    $LD->approved          = 1;
                    $LD->date_approved     = date("U");
                    
                    if($LD->type == "regular"){
                        
                        $LC->used_leaves = $LC->used_leaves + 1;
                            
                    }else if($LD->type == "sick"){
                        
                        $LC->sick_leaves = $LC->sick_leaves + 1;
                        
                    }else if($LD->type == "emergency"){
                        
                        $LC->emergency_leaves  = $LC->emergency_leaves + 1;
                            
                    }
                }
        
                $LD->stage          = count(explode(',',$LD->stage_stamps))  + 1;
        
                $LD->save();
                $LC->save();
            }
            
        }else{
            
            
            if(empty($LD->stage_stamps)){
                
                $LD->stage_stamps   = $_SESSION['user_id'];
                
            }else{
                
                $LD->stage_stamps   .= "," . $_SESSION['user_id'];
                
            }
            
            
            if($LD->stage_stamps == $process->chain_staff_id){
                
                $LD->approved          = 1;
                $LD->date_approved     = date("U");

                
                if($LD->type == "regular"){
                    
                    $LC->used_leaves = $LC->used_leaves + 1;
                    
                }else if($LD->type == "sick"){
                    
                    $LC->sick_leaves = $LC->sick_leaves + 1;
                    
                }else if($LD->type == "emergency"){
                    
                    $LC->emergency_leaves  = $LC->emergency_leaves + 1;
                    
                }
            }
            
            $LD->stage          = count(explode(',',$LD->stage_stamps))  + 1;
            
            $LD->save();
            $LC->save();
            
        }


        //echo $process->id;
        

        echo "done";

    } else{
            
    echo ($_POST['date_id']) . "unsucessful darn";
    
    }

?>