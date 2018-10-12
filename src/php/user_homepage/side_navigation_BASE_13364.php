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
        
        
        
        
        <script>
            function guest_committee_select(th){
                a = document.getElementById("a_"+th.value);
                c = document.getElementById(th.value);
                hrefs = a.href.split('?');
                a.href = hrefs[0]+"?"+hrefs[1]+c.checked;
                alert(a.href);
                a.click();
            }
        </script>
        
        
        
        
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
                        echo "<form action=\"\" method=\"post\">";
                        for($i = 0; $i < count($committees); $i++){
                            echo sprintf("
                            <label  for=\"%s\" ;\">
                                <div id=\"div_%s\" style=\"display:block\">
                                    <input type=checkbox id=\"%s\" value=\"%s\" onchange=\"guest_committee_select(this)\">%s<br>
                                    <a method=\"get\" href=\"committee_events.php?c_name=".$committees[$i]["comm_name"]."\" target=\"main_frame\" id=a_%s name=a_%s style=\"display:block\"></a><br>
                                </div>
                            </label>
                            ", $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"]);
                        }
                        echo "</form>";
                
                    } else{
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
