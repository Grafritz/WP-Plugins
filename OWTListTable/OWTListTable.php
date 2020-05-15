<?php
/*
* Plugin name: OWT List Table
* Description: C'est un simple Plugin pour apprendre WP-List-Table
* Author: Jean Fritz DUVERSEAU
* Version: 1.0
*/

add_action("admin_menu", "wpl_owt_list_table_menu");

function wpl_owt_list_table_menu()
{
    add_menu_page(
        "OWT List Table", 
        "OWT List Table", 
        "manage_options", 
        "owt-list-table-slug", 
        "wpl_owt_list_table_fn");
}

function wpl_owt_list_table_fn()
{
    $action = isset($_GET['action'])?$_GET['action']:'';
    if( $action=='owt-edit' )
    {
        $post_id = isset($_GET['post_id'])? intval($_GET['post_id']):'';
    
        ob_start();
        include_once plugin_dir_path(__FILE__) .'views/owt_edit.php';
        $template = ob_get_contents();
        ob_end_clean();
        echo $template;

    }elseif( $action=='owt-delete' ){

    }else{
        ob_start();
        include_once plugin_dir_path(__FILE__) .'views/owt_table_list.php';
        $template = ob_get_contents();
        ob_end_clean();
        echo $template;
    }
}