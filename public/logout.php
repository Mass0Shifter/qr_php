<?php require '../inc/_global/config.php'; ?>
<?php 

$session->logout();
redirect_to("op_auth_signin.php");

?>