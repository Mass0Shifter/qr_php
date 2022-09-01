<?php require_once('../../inc/initialize.php');

    if(isset($_POST['mark_finished'])){

        if($_POST['post_type'] == "client_request"){
            $request = ClientRequest::find_by_id($_POST['request_id']);
        }
        
        if($_POST['post_type'] == "material_request"){
            $request = MaterialRequest::find_by_id($_POST['request_id']);
        }

        if($request->finished == 1){
            return;
        }

        if($_POST['status'] == 'boss'){
            $request->set_marked_finished_boss(true);
        }else if($_POST['status'] == 'qs'){        
            $request->set_marked_finished_qs(true);
        }else if($_POST['status'] == 'creator'){
            $request->set_marked_finished_qs(true);
        }
        
        $request->get_finished_stats();

        if(($request->marked_finished_boss == true) && ($request->marked_finished_qs == true)){
            $request->finished = 1;
            $request->update();
            
            if($_POST['post_type'] == "material_request"){
                $r_list = StockRequest::find_all_by_material_request_id($request->id);
                foreach($r_list as $sr){
                    $mat = Material::find_by_id($sr->material_id);
                    if($mat->quantity >= $sr->quantity){
                        $positive = $sr->quantity;
                        $negative = 0;                
                    }else{
                        $positive = $mat->quantity;
                        $negative = ($sr->quantity - $mat->quanity);
                    }
                    
                    $mat->quantity =  $mat->quantity - $positive;
                    $mat->negative_quantity =  $negative;
                    
                    $mat->update();
                }
                echo "Mat _ completed";
            }
            echo "Completed";
        }
    } else{
            
    echo "unsucessful darn";

    }

    ?>