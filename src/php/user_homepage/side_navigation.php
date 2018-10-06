<html>
    <head>
        <style>
            body{
                width:90%;
                height:95%;
                border:6px outset orange;
                background:#ffffff
            }
        </style>
    </head>
    <body>
        <div style="">
            <a method="get" href="previous_events.php?id=12" target="main_frame" id="previous_events" name="previous_events" style="display:none">Previous Events</a><br>
            <a href = "pending_events.php" target="main_frame" id = pending_events name = "pending_events" style="display:none">Pending Events</a><br>
            <a href = "new_events.php" target="main_frame" id ="new_events" name = "new_events" style="display:none">New Events</a>
            <?php
                $_POST["who"] = "g";
                include "../../data/get_data.php";
                $committees = get_table_data_query("select distinct comm_name from user where comm_name != 'admin'");
                for($i = 0; $i < count($committees); $i++){
                    echo "
                    <div id=\"div_".$committees[$i]["comm_name"]."\" style=\"display:none\">
                        <input type=checkbox  value=\"".$committees[$i]["comm_name"]."\">".$committees[$i]["comm_name"]."<br>
                    </div>
                    ";
                }
            ?>
        </div>
        
        <?php   
            $bars = array(
                "a" => array("previous_events", "pending_events"),
                "u" => array("previous_events", "pending_events", "new_events"),
                "g" => array("comm_name")
            );
            if(isset($_POST["who"])){
                $display_bars = $bars[$_POST["who"]];
                foreach($display_bars as $bar){
                    if($bar == "comm_name"){
                        for($i = 0; $i < count($committees); $i++){
                    echo "
                    <div id=\"div_".$committees[$i]["comm_name"]."\" style=\"display:none\">
                        <input type=checkbox  value=\"".$committees[$i]["comm_name"]."\">".$committees[$i]["comm_name"]."<br>
                    </div>
                    ";
                }       
                    }else{
                        echo "
                            <script>
                                document.getElementById(\"".$bar."\").style.display = \"block\";
                            </script>
                        ";
                    }
                }
            }
        ?>
        
    </body>
<html>
