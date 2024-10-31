<?php /*
Plugin Name:  Remove Update Notification
Plugin URI : https://profiles.wordpress.org/mehtashail/
Description: Remove Update Notification of Wordpress , Themes & Plugins
Version: 1.0.0
Author: Shail Mehta
Text Domain: wporg
Author URL : https://profiles.wordpress.org/mehtashail/
*/
?>
<?php
// Prevent direct file access
if (!defined('ABSPATH')) {
    exit;
}
defined('REMOVEUPDATE_ROOT') or define('REMOVEUPDATE_ROOT', plugin_dir_path(__FILE__));
/*Activation & Deactivation */
function remove_update()
{
    register_activation_hook(__FILE__, 'remove_update_install');
    register_deactivation_hook(__FILE__, 'remove_update_install');
}

/*Plugin Install*/
function remove_update_install()
{
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
}


//To Disable all the Nags & Notifications :
function remove_update_core(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_update_core');
add_filter('pre_site_transient_update_plugins','remove_update_core');
add_filter('pre_site_transient_update_themes','remove_update_core');