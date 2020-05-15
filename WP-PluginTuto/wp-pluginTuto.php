<?php
/**
* Plugin Name: Plugin TUTO WP
* plugin URI: http://www.brain-dev.net
* Description: I will Create a table in the database and other things.
* Version: 1.0.1
* Author: Jean Fritz DUVERSEAU
* Author URI: http://brain-dev.net
*/
//https://mosaika.fr/ajouter-onglet-parrainage-produits-woocommerce
function commissionTable()
{
    /**
     * Si inexistante, on créée la table SQL "commissions" après l'activation du thème
     */
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $commissions_table_name = $wpdb->prefix . 'commissions';

    $commissions_sql = "CREATE TABLE IF NOT EXISTS $commissions_table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        type varchar(45) DEFAULT NULL,
        amount decimal(10,2) DEFAULT NULL,
        user_id mediumint(9) DEFAULT NULL,
        order_id mediumint(9) DEFAULT NULL,
        line_product_id mediumint(9) DEFAULT NULL,
        line_product_rate decimal(10,2) DEFAULT NULL,
        line_product_quantity mediumint(9) DEFAULT NULL,
        line_subtotal decimal(10,2) DEFAULT NULL,
        user_notified varchar(45) DEFAULT NULL,
        time datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    dbDelta($commissions_sql);
}
register_activation_hook(__FILE__,'commissionTable');

?>