<?php

require_once(ABSPATH.'wp-admin/includes/class-wp-list-table.php');

class OWTListTable extends WP_List_Table{

    // Define dataSet for WP_List_Table => data
    public function wp_list_table_data($orderby='', $order='')
    {
        $data = array(
            array('id' => 1, 'name' => 'Fredeline Saskia', 'email' => 'fredeline@gmail.com', 'designation'=>'PHP'),
            array('id' => 2, 'name' => 'Jean Fritz DUVER', 'email' => 'jeanfritz@gmail.com', 'designation'=>'Angular'),
            array('id' => 3, 'name' => 'Emmanuel DUVERSE', 'email' => 'emmanuled@gmail.com', 'designation'=>'ASP.NET CORE'),
            array('id' => 4, 'name' => 'Jeff Jean ADMEEE', 'email' => 'jeffadmej@gmail.com', 'designation'=>'Flutter / Dart')
        );
        if($orderby=='name' && $order=='asc'){
            $data = array(
                array('id' => 3, 'name' => 'Emmanuel DUVERSE', 'email' => 'emmanuled@gmail.com', 'designation'=>'ASP.NET CORE'),
                array('id' => 1, 'name' => 'Fredeline Saskia', 'email' => 'fredeline@gmail.com', 'designation'=>'PHP'),
                array('id' => 2, 'name' => 'Jean Fritz DUVER', 'email' => 'jeanfritz@gmail.com', 'designation'=>'Angular'),
                array('id' => 4, 'name' => 'Jeff Jean ADMEEE', 'email' => 'jeffadmej@gmail.com', 'designation'=>'Flutter / Dart')
            );
            //sort($data);
        }elseif($orderby=='name' && $order=='desc'){
            $data = array(
                array('id' => 4, 'name' => 'Jeff Jean ADMEEE', 'email' => 'jeffadmej@gmail.com', 'designation'=>'Flutter / Dart'),
                array('id' => 2, 'name' => 'Jean Fritz DUVER', 'email' => 'jeanfritz@gmail.com', 'designation'=>'Angular'),
                array('id' => 1, 'name' => 'Fredeline Saskia', 'email' => 'fredeline@gmail.com', 'designation'=>'PHP'),
                array('id' => 3, 'name' => 'Emmanuel DUVERSE', 'email' => 'emmanuled@gmail.com', 'designation'=>'ASP.NET CORE'),
            );
            //rsort($data);
        }
        
        return $data;
    }      

    // prepare_items
    public function prepare_items()
    {
        $orderby = isset($_GET['orderby'])?  trim($_GET['orderby']):'';
        $order = isset($_GET['order'])?  trim($_GET['order']):'';
        $this->items = $this->wp_list_table_data($orderby, $order);
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
            'id' => 'ID', 
            'name' => 'Name', 
            'email' => 'Email', 
            'designation' => 'Designation'
        );
        return $columns;
    }

    // column_default
    public function column_default($item, $column_name)
    {
        switch($column_name){
            case 'id':
            case 'name':
            case 'email':
            case 'designation':
                return $item[$column_name];
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
            'name'=> array('name', false),
            'email'=> array('email', false),
            'designation'=> array('designation', false)
        );
    }
}

function owt_list_table_layout(){
    $owt_list_table = new OWTListTable();

    // Call prepare_items from class
    $owt_list_table->prepare_items();
    echo '<h2>List of Elements </h2>';
    $owt_list_table->display();
}

// call function
owt_list_table_layout();