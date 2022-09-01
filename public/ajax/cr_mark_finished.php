<?php require_once('../../inc/initialize.php');


    if(isset($_POST['mark_finished'])){

        $request = ClientRequest::find_by_id($_POST['request_id']);

        if($_POST['status'] == 'boss'){
            $request->set_marked_finished_boss(true);
        }else if($_POST['status'] == 'qs'){        
            $request->set_marked_finished_qs(true);
        }   
        
        $request->get_finished_stats();

        if(($request->marked_finished_boss == true) && ($request->marked_finished_qs == true)){
            $request->finished = 1;
            $request->update();
        }
    } else{
            
    echo "unsucessful darn";

    }
?>