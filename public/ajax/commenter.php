<?php require_once('../../inc/initialize.php');

    if(isset($_POST['post_type'])){

        $reply_id          = $_POST['reply_id'];
        $post_id           = $_POST['post_id'];
        $commentator_id    = $_SESSION['user_id'];
        $body              = $_POST['body'];
        $post_type         = $_POST['post_type'];
        $reference_id      = 0;
        $reference_type    = '';

        $new_comment = new Comment();

        $new_comment->reply_id          = $reply_id;
        $new_comment->post_id           = $post_id;
        $new_comment->commentator_id    = $commentator_id;
        $new_comment->body              = $body;
        $new_comment->post_type         = $post_type;
        $new_comment->reference_id      = $reference_id;
        $new_comment->reference_type    = $reference_type;
        $new_comment->date_created    = date_format(date_create('now'),"Y/m/d H:m:s");

        $new_comment->create();
        
        echo "Comment Sent";
    } 

    

?>