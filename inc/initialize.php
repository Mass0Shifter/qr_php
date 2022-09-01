<?php 
    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("PUB_IMG_PATH", 'assets/img');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');

    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    require_once('functions.php');
    require_once('database.php');
    require_once('_classes/database_object.php');
    require_once('_classes/access_control.php');
    require_once('_classes/sessions.php');
    require_once('_classes/user.php');
    require_once('_classes/client.php');
    require_once('_classes/property.php');
    require_once('_classes/sales.php');
    require_once('_classes/tenants.php');
    require_once('_classes/property.php');

    if(isset($_SESSION['user_id'])){
        $user = User::find_by_id($_SESSION['user_id']);
        $session->login($user);
    }
    
?>