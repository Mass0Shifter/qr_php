<?php

    define("PRIVATE_PATH", dirname(__FILE__));
    define("PROJECT_PATH", dirname(PRIVATE_PATH));
    define("PUBLIC_PATH", PROJECT_PATH . '/public');
    define("PUB_IMG_PATH", 'assets/img');
    define("SHARED_PATH", PRIVATE_PATH . '/shared');

    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    require_once(PROJECT_PATH.'/functions.php');
    require_once(PROJECT_PATH.'/database.php');
    require_once(PROJECT_PATH.'/_classes/database_object.php');
    require_once(PROJECT_PATH.'/_classes/user.php'); 
    require_once(PROJECT_PATH.'/_classes/sessions.php');
    

    if(isset($_SESSION['user_id'])){
        $user = User::find_by_id($_SESSION['user_id']);
        $session->login($user);
    }
 

// Include required classes
require(PROJECT_PATH.'/_classes/Template.php');


// **************************************************************************************************
// TEMPLATE OBJECT
// **************************************************************************************************

//                               : Name, version and assets folder's name
$zero                             = new Template('WAOMS', '1.0', '../assets');


// **************************************************************************************************
// GLOBAL META & OPEN GRAPH DATA
// **************************************************************************************************

//                               : The data is added in the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> section of the page
$zero->author                     = 'Zero';
$zero->robots                     = 'noindex, nofollow';
$zero->title                      = 'WhiteAvenueGroup - Staff Page';
$zero->description                = 'WhiteAvenueGroup';

//                               : The url of your site, used in Open Graph Meta Data (eg 'https://example.com')
$zero->og_url_site                = '';

//                               : The url of your image/logo, used in Open Graph Meta Data (eg 'https://example.com/assets/img/your_logo.png')
$zero->og_url_image               = '';


// **************************************************************************************************
// GLOBAL GENERIC
// **************************************************************************************************

// ''                            : default color theme
// 'amethyst'                    : Amethyst color theme
// 'city'                        : City color theme
// 'flat'                        : Flat color theme
// 'modern'                      : Modern color theme
// 'smooth'                      : Smooth color theme
$zero->theme                      = 'whiteavenue';

// true                          : Enables Page Loader screen
// false                         : Disables Page Loader screen
$zero->page_loader                = false;

// true                          : Remembers active color theme between pages
//                                (when set through color theme helper Template._uiHandleTheme())
// false                         : No cookies
$zero->cookies                    = false;

// You will have to obtain a Google Maps API key to use Google Maps, for more info please have a look at
// https://developers.google.com/maps/documentation/javascript/get-api-key#key
$zero->google_maps_api_key        = '';


// **************************************************************************************************
// GLOBAL INCLUDED VIEWS
// **************************************************************************************************

//                               : Useful for adding different sidebars/headers per page or per section
$zero->inc_side_overlay           = '';
$zero->inc_sidebar                = '';
$zero->inc_header                 = '';
$zero->inc_footer                 = '';


// **************************************************************************************************
// GLOBAL SIDEBAR & SIDE OVERLAY
// **************************************************************************************************

// true                          : Left Sidebar and right Side Overlay
// false                         : Right Sidebar and left Side Overlay
$zero->l_sidebar_left             = true;

// true                          : Mini hoverable Sidebar (screen width > 991px)
// false                         : Normal mode
$zero->l_sidebar_mini             = true;

// true                          : Visible Sidebar (screen width > 991px)
// false                         : Hidden Sidebar (screen width > 991px)
$zero->l_sidebar_visible_desktop  = true;

// true                          : Visible Sidebar (screen width < 992px)
// false                         : Hidden Sidebar (screen width < 992px)
$zero->l_sidebar_visible_mobile   = false;

// true                          : Dark themed Sidebar
// false                         : Light themed Sidebar
$zero->l_sidebar_dark             = true;

// true                          : Hoverable Side Overlay (screen width > 991px)
// false                         : Normal mode
$zero->l_side_overlay_hoverable   = false;

// true                          : Visible Side Overlay
// false                         : Hidden Side Overlay
$zero->l_side_overlay_visible     = false;

// true                          : Enables a visible clickable (closes Side Overlay) Page Overlay when Side Overlay opens
// false                         : Disables Page Overlay when Side Overlay opens
$zero->l_page_overlay             = true;

// true                          : Custom scrolling (screen width > 991px)
// false                         : Native scrolling
$zero->l_side_scroll              = true;


// **************************************************************************************************
// GLOBAL HEADER
// **************************************************************************************************

// true                          : Fixed Header
// false                         : Static Header
$zero->l_header_fixed             = true;

// true                          : Dark themed Header
// false                         : Light themed Header
$zero->l_header_dark              = false;


// **************************************************************************************************
// GLOBAL MAIN CONTENT
// **************************************************************************************************

// ''                            : Full width Main Content
// 'boxed'                       : Full width Main Content with a specific maximum width (screen width > 1200px)
// 'narrow'                      : Full width Main Content with a percentage width (screen width > 1200px)
$zero->l_m_content                = '';


// **************************************************************************************************
// GLOBAL MAIN MENU
// **************************************************************************************************

// It will get compared with the url of each menu link to make the link active and set up main menu accordingly
// If you are using query strings to load different pages, you can use the following value: basename($_SERVER['REQUEST_URI'])
$zero->main_nav_active            = basename($_SERVER['PHP_SELF']);

// You can use the following array to create your main menu
$zero->main_nav                   = array();
