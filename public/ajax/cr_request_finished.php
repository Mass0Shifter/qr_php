<?php require_once('../../inc/initialize.php');

    if(isset($_POST['requested_finish'])){

        $request = ClientRequest::find_by_id($_POST['request_id']);

        $request->set_request_finish(true);
        
    } else{
            
    echo "unsucessful darn";
    
    }
?>