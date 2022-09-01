<?php require_once('../../inc/initialize.php');

    if(isset($_POST['date'])){
        
        $date = $_POST['date'];
        $staff_id = $_SESSION['user_id'];
        
        $exists = LeaveDates::check_date($staff_id, $date);
        
        if($exists){
            echo "isn't available";
        }else{
            echo "is available";
        }
    }
    
?>