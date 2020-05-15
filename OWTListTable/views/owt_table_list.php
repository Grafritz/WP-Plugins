<?php

require_once(ABSPATH.'wp-admin/includes/class-wp-list-table.php');

class OWTListTable extends WP_List_Table
{
    // Define dataSet for WP_List_Table => data
    public function wp_list_table_data($orderby='', $order='', $search_term='')
    {
        global $wpdb;
        $_order='';
        $_orderby='';
        if($order=='asc') $_order='asc';
        if($order=='desc')$_order='desc';
        if($orderby=='id' || $orderby=='title'  || $orderby=='content'  || $orderby=='slug' ) $_orderby = $orderby;

        
        if(!empty($search_term))
        {
            $all_posts = $wpdb->get_results(
                "SELECT * FROM ".$wpdb->posts.
                " WHERE post_type='post' AND post_status='publish' 
                 AND (post_title LIKE '%".$search_term."%' OR post_content LIKE '%".$search_term."%') "
            );
        }
        elseif( $_orderby!='')
        {
            if( $_orderby!='id' && $_orderby!='slug') $_orderby=' post_'.$_orderby;
                
            if( $_orderby=='slug') $_orderby=' post_name ';

            $all_posts = $wpdb->get_results(
                "SELECT * FROM ".$wpdb->posts.
                " WHERE post_type='post' AND post_status='publish' 
                ORDER BY ".$_orderby." ".$_order
            );
        }else{
            $all_posts = $wpdb->get_results(
                "SELECT * FROM ".$wpdb->posts.
                " WHERE post_type='post' AND post_status='publish' ORDER BY id desc"
            );
        }
        
        $post_array = [];
        if(count($all_posts) >0 )
        {
            foreach($all_posts as $index=> $post)
            {
                $post_array[] = array(
                    'id'=>$post->ID,
                    'title'=>$post->post_title,
                    'content'=>$post->post_content,
                    'slug'=>$post->post_name
                );
            }
        }
        //print_r($post_array);
        return $post_array;
    }      

    // prepare_items
    public function prepare_items()
    {
        $orderby = isset($_GET['orderby'])?  trim($_GET['orderby']):'';
        $order = isset($_GET['order'])?  trim($_GET['order']):'';
        
        $search_term = isset($_POST['s'])?  trim($_POST['s']):'';

        $datas = $this->wp_list_table_data($orderby, $order, $search_term);
        $per_page = 3;
        $current_page = $this->get_pagenum();
        $total_items = count($datas);

        $this->set_pagination_args(array(
            'total_items'=>$total_items,
            'per_page'=> $per_page
        ));

        $this->items = array_slice($datas,(($current_page-1)*$per_page), $per_page);
        $columns = $this->get_columns();
        // 
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
    }

    // get_columns
    public function get_columns() 
    {
        $columns = array(
            'cb'=> '<input type="checkbox" />',
            'id' => 'ID', 
            'title' => 'Title', 
            'content' => 'Content', 
            'slug' => 'Post Slug', 
            'action' => 'Actions'
        );
        return $columns;
    }

    // column_default
    public function column_default($item, $column_name)
    {
        switch($column_name){
            case 'id':
            case 'title':
            case 'content':
            case 'slug':
                return $item[$column_name];
            case 'action':
                return ''.sprintf('<a href="?page=%s&action=%s&post_id=%s">Edit</a>', $_GET['page'], 'owt-edit', $item['id'])
                .' | '.sprintf('<a href="?page=%s&action=%s&post_id=%s">Delete</a>', $_GET['page'], 'owt-delete', $item['id']);
            default:
                return 'No value';
        }
    }

    //
    public function get_hidden_columns()
    {
        //return array('id','name');
        return array();
    }

    //
    public function get_sortable_columns()
    {
        return array(
            'id'=> array('id', false),
            'title'=> array('title', false),
            'content'=> array('content', false),
            'slug'=> array('slug', false)
        );
    }

    public function column_cb($item){
        return sprintf('<input type="checkbox" name="post[]" value="%s" />', $item['id']);
    }

    public function column_title($item){
        $action = array(
            'edit1'=> sprintf('<a href="post.php?post=%s&action=%s">Edit Post</a>', 'edit', $item['id']),
            'edit'=> sprintf('<a href="?page=%s&action=%s&post_id=%s">Edit</a>', $_GET['page'], 'owt-edit', $item['id']),
            'delete'=> sprintf('<a href="?page=%s&action=%s&post_id=%s">Delete</a>', $_GET['page'], 'owt-delete', $item['id'])
        );
        return sprintf('%1$s %2$s', $item['title'], $this->row_actions($action));
    }

    public function get_bulk_actions()
    {
        $actions = array(
            'delete'=> 'Delete',
            'edit'=> 'Edit'
        );
        return $actions;
    }
}

function owt_list_table_layout(){
    $owt_list_table = new OWTListTable();

    // Call prepare_items from class
    $owt_list_table->prepare_items();
    echo '<h2>List of Elements</h2>';
    echo '<form method="post" name="frm_search_post" action="'.$_SERVER["PHP_SELF"].'?page=owt-list-table-slug">';
    $owt_list_table->search_box("Recherche","search_post_id");
    echo '</form>';
    $owt_list_table->display();
}

// call function
owt_list_table_layout();