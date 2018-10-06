<?php
    include "../../data/get_data.php";
    $committees = get_table_data_query("select comm_name from user where comm_name != 'admin';");
    for($i = 0; $i < count($committees); $i++){
        
        if(isset($_GET["c_name"]) and $_GET["c_name"] = $committees[$i]["comm_name"]."true"){
            echo "*".$_GET["c_name"]."*";
        }
    }
    print($_GET["c_name"]);
?>
