<?php 
require_once('../../inc/initialize.php');

if(isset($_GET['staff_id'])){
    $_SESSION['staff_config_id'] = $_GET['staff_id'];

    redirect_to('../user_data_configuration.php');
}
?>