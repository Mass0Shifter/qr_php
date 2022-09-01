<?php require_once('../../inc/initialize.php');

    if(isset($_POST['requested_finish'])){

        if($_POST['post_type'] == "client_request"){
            $request = ClientRequest::find_by_id($_POST['request_id']);
        }
        
        if($_POST['post_type'] == "material_request"){
            $request = MaterialRequest::find_by_id($_POST['request_id']);
        }

        $request->set_request_finish(true);
        
    } else{
            
    echo "unsucessful darn";
    
    }

?>