
<?php
    include 'get_tables.php';    //Everytime when this file is called, data is refreshed frrom tables
    
    function get_table_data($table_name){
        global $json_dict;
        $table_json = $json_dict[$table_name];      //$json_dict is table from get_tables file;
        $table_array = json_decode($table_json, true);
        return $table_array; 
    }
    "
        Sample Data :
            table_name = 'room'
            
            room_no	room_type
        1)  001 	others
        2)  403B 	classroom
        3)  404 	classroom
        4)  411B 	lab
        
        
        /*for getting data in php file:
            use : */
            include 'get_data.php'
        //This will get all the functions of this file in your file.

        
        //get tables by : 
        room_table = get_table_data('room');
        //accessing first record(tuple) :
            room_table[0];
        //accessing room_type of 3rd record :
            room_table[2]['room_type'];
            
            .... do not forget a dollar sign before room_table.
    "
    ;
    
    function get_table_data_query($query){
        return get_json_data($query);
    }
    if(isset($_GET['query'])){
        get_table_data_query($_GET['query']);
    }
?>
