<?php
$root_to_path = join(DIRECTORY_SEPARATOR, array($_SERVER['DOCUMENT_ROOT'], 'luzcasa-admin', 'inc', 'initialize.php'));
require_once($root_to_path);
/**
 * backend/config.php
 *
 * Author: pixelcave
 *
 * Backend pages configuration file
 *
 */

// **************************************************************************************************
// INCLUDED VIEWS
// **************************************************************************************************

$zero->inc_side_overlay           = PROJECT_PATH . '/inc/backend/views/inc_side_overlay.php';
$zero->inc_sidebar                = PROJECT_PATH . '/inc/backend/views/inc_sidebar.php';
$zero->inc_header                 = PROJECT_PATH . '/inc/backend/views/inc_header.php';
$zero->inc_footer                 = PROJECT_PATH . '/inc/backend/views/inc_footer.php';

$is_admin = false;

// if (isset($_SESSION['user_id'])) {

//     $user = User::find_by_id($_SESSION['user_id']);
//     if ($user->status == "admin") {
//         $is_admin = true;
//     }
// }


// **************************************************************************************************
// MAIN MENU
// **************************************************************************************************

if ($is_admin) {
    $zero->main_nav                   = array(
        array(
            'name'  => 'Dashboard',
            'icon'  => 'si si-speedometer',
            'url'   => 'index.php'
        ),
        array(
            'name'  => 'User Interface',
            'type'  => 'heading'
        ),
        array(
            'name'  => 'My Properties',
            'icon'  => 'si si-note',
            'url'   => 'my_properties.php'
        ),
        array(
            'name'  => 'My Tenants',
            'icon'  => 'si si-energy',
            'url'   => 'my_tenants.php'
        ),
        // array(
        //     'name'  => 'Resources',
        //     'icon'  => 'si si-grid',
        //     'sub'   => array(
        //         array(
        //             'name'  => 'Dashboard',
        //             'url'   => 'resource_manager.php'
        //         ),
        //         array(
        //             'name'  => 'Stock Keeping',
        //             'url'   => 'stock_keeping.php'
        //         ),
        //         array(
        //             'name'  => 'Site Material Requests',
        //             'url'   => 'resource_requests_new.php'
        //         ),
        //         array(
        //             'name'  => 'Create/Edit Suppliers Data',
        //             'url'   => 'supplier_data_new.php'
        //         ),
        //         array(
        //             'name'  => 'Create/Edit Material Data',
        //             'url'   => 'material_data_new.php'
        //         )
        //     )
        // )
    );
} else {
    $zero->main_nav                   = array(
        array(
            'name'  => 'Dashboard',
            'icon'  => 'si si-speedometer',
            'url'   => 'index.php'
        ),
        array(
            'name'  => 'User Interface',
            'type'  => 'heading'
        ),
        array(
            'name'  => 'My Properties',
            'icon'  => 'si si-note',
            'url'   => 'my_properties.php'
        ),
        array(
            'name'  => 'My Tenants',
            'icon'  => 'si si-energy',
            'url'   => 'my_tenants.php'
        )
    );
}
