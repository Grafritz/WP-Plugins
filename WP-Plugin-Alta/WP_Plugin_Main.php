<?php
/*
Plugin Name: ALta WP Plugin
Plugin URI: https://www.brain-dev.net
Description: Demande de messe, et autres... avec WP_List_Table Class
Version: 1.0
Author: Brain Dev
Author URI:  https://www.facebook.com/Grafritz
*/
// https://www.sitepoint.com/using-wp_list_table-to-create-wordpress-admin-tables/

define('CUSTOMER_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));

// Partie 1 : créer une table SQL custom
require_once(CUSTOMER_PLUGIN_DIR_PATH . 'Scripts/scripts-tables.php');
register_activation_hook(__FILE__, 'createTableCustomer');
register_activation_hook(__FILE__, 'createTableDmdDeMesse');

require_once(CUSTOMER_PLUGIN_DIR_PATH . 'Customer/wp-CustomerClass.php');
require_once(CUSTOMER_PLUGIN_DIR_PATH . 'Customer/SP-PluginCust.php');
require_once(CUSTOMER_PLUGIN_DIR_PATH . 'Messes/DmdDeMesseclass.php');
require_once(CUSTOMER_PLUGIN_DIR_PATH . 'Messes/messe-class.php');


add_action( 'plugins_loaded', function () {
	SP_PluginMesse::get_instance();
} );

add_action( 'plugins_loaded', function () {
	SP_Plugin::get_instance();
} );
