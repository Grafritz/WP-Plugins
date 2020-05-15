<?php
/**
* Plugin Name: Plugin Learn WP
* plugin URI: http://www.brain-dev.net
* Description: I will Create a table in the database and other things.
* Version: 1.0.2
* Author: Jean Fritz DUVERSEAU
* Author URI: http://brain-dev.net
*/

//$installed_ver = get_option($reunionTableVersionName);

function createTable()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $tableName = $wpdb->prefix . 'reunion';
	
	$reunionTableVersionCode = '1.1';
	$reunionTableVersionName = 'reunionTable';

    if( $wpdb->get_var('SHOW TABLES LIKE '.$tableName) != $tableName )
    {
        $sql = 'CREATE TABLE  '.$tableName.' (
            id INTEGER(11) UNSIGNED AUTO_INCREMENT,
            hit_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            user_agent VARCHAR(255),
            PRIMARY KEY(id)
            ) '.$charset_collate.';';

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );

        //add_option($reunionTableVersionName, $reunionTableVersionCode);
    }
}
register_activation_hook(__FILE__,'createTable');

?>