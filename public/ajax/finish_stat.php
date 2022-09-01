<?php require_once('../../inc/initialize.php'); ?>
<?php
    
    if( isset($_POST['request_id']) ){
        $post_type = $_POST['post_type'];
        if($post_type == "client_request"){
            $request = ClientRequest::find_by_id($_POST['request_id']);
        }
        
        if($post_type == "material_request"){
            $request = MaterialRequest::find_by_id($_POST['request_id']);
        }
        
        if($request->finished){
            echo "finished";
            return;
        }

        $request->get_finished_stats();
    }else{
        return;
    }

?>
<?php if($post_type == "material_request"){
    if($request->created_by_id === $_SESSION['user_id']) {?> 
    <button <?php if($request->request_finish){echo 'disabled'; } ?> class="btn btn-primary"  data-toggle="modal" data-target="#modal-block-popin-request"> Request Finished</button> 
<?php }
    if(($request->request_finish) && (User::find_by_id($_SESSION['user_id'])->status == 'boss')) {?> 
    <button <?php if($request->marked_finished_boss){echo 'disabled'; } ?> class="btn btn-primary"  data-toggle="modal" data-target="#modal-block-popin-boss">Accept Finished</button> 
<?php }
    if(($request->request_finish) && (User::find_by_id($_SESSION['user_id'])->status == 'qs')) {?> 
    <button <?php if($request->marked_finished_qs){echo 'disabled'; } ?> class="btn btn-primary"  data-toggle="modal" data-target="#modal-block-popin-qs" >Accept Finished</button> 
<?php }


    }else if($post_type == "client_request"){
    ?>
<?php if($request->handler_id === $_SESSION['user_id']) {?> 
    <button <?php if($request->request_finish){echo 'disabled'; } ?> class="btn btn-primary"  data-toggle="modal" data-target="#modal-block-popin-request"> Request Finished</button> 
<?php }
    if(($request->request_finish) && (User::find_by_id($_SESSION['user_id'])->status == 'boss')) {?> 
    <button <?php if($request->marked_finished_boss){echo 'disabled'; } ?> class="btn btn-primary"  data-toggle="modal" data-target="#modal-block-popin-boss">Accept Finished</button> 
<?php }
    if(($user->status == 'boss')) {?> 
    <a class="btn btn-primary" <?php if($request->finish){echo 'hidden'; } ?>  href="request_handler_config.php?request_id=<?php echo $request->id; ?>">Set/Change Handler</a> 
<?php }
    if(($request->request_finish) && (User::find_by_id($_SESSION['user_id'])->id == $request->created_by_id)) {?> 
    <button <?php if($request->marked_finished_qs){echo 'disabled'; } ?> class="btn btn-primary"  data-toggle="modal" data-target="#modal-block-popin-qs" >Accept Finished</button> 
<?php }
    }
    ?>