<?php require_once('../../inc/initialize.php'); ?>
<?php
    
    if( isset($_POST['request_id']) ){
        //echo $post_type;
        $comments = Comment::find_all_by_id_type($_POST['request_id'], $_POST['post_type']);
        if($comments == false){
            echo "No Comments";
            return;
        }
        if($_POST['count'] == count($comments)){
            return;
        }
    }else{
        return;
    }

?>
<?php foreach($comments as $comment) { ?>

<li class="timeline-event">
    <div class="timeline-event-icon bg-primary">
        <i class="fab fa-readme"></i>
    </div>
    <div class="timeline-event-block block">
        <div class="block-header block-header-default">
            <h3 class="block-title"><?php echo "Comment";?></h3>
            <div class="block-options">
                <div class="timeline-event-time block-options-item font-size-sm font-w600">
                    <?php echo $comment->date_created ?>
                </div>
            </div>
        </div>
        <div class="block-content">
            <div class="media font-size-sm">
                <a class="img-link mr-2" href="javascript:void(0)">
                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php  User::find_by_id($comment->commentator_id)->get_image_src(); ?>" alt="">
                </a>
                <div class="media-body">
                    <p>
                        <a class="font-w600" href="javascript:void(0)"><?php echo User::find_by_id($comment->commentator_id)->fullName(); ?></a> : 
                        <pre> <?php echo $comment->body ?> </pre>
                    </p>
                    <p>
                        <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</li>

<?php } ?>
<input type="number" id="recount" value="<?php echo count($comments); ?>" hidden >