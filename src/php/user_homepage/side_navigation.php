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
<?php
    include "../../data/get_data.php";
    session_start();
?>

    <!--
        In this div all the options are set out to html page
        with display none for all in (user, admin, guest).
    -->
    <div>
        <a href = "previous_events.php" target="main_frame"  id = "previous_events"  style="display:none">Previous Events</a><br>
        <a href = "pending_events.php"  target="main_frame"  id = "pending_events"   style="display:none">Pending Events </a><br>
        <a href = "new_events.php"      target="main_frame"  id = "new_events"       style="display:none">New Events     </a><br>
        <a href = "rejected.php"        target="main_frame"  id = "rejected_events"  style="display:none">Rejected Events</a><br>
        <a href = "acepted.php"         target="main_frame"  id = "accepted_events"  style="display:none">Accepted Events</a><br>

        <?php
            //display all the committee radio button dynamically.
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
            hrefs = a.href.split('&');
            a.href = hrefs[0]+"&checked="+c.checked;
            a.click();
        }
    </script>

    <?php
        $bars = array(
            "a" => array("pending_events", "acepted", "rejected_events", "accepted_events"),
            "u" => array("previous_events", "pending_events", "new_events"),
            "g" => array("comm_name")
        );

        if(isset($_SESSION["uid"])){

            if(isset($_SESSION["guest"])){ $is_guest = true;}
            else {$is_guest = false;}
            if(!$is_guest) {
                $user_data = get_table_data_query("SELECT * FROM user WHERE uid=".$_SESSION["uid"])[0];
                $who = $user_data["type_of_user"];
            } else{
                $who = 'g';
            }

                if(in_array($who, array("a", "u"))){
                    echo "<script>document.getElementById(\"pending_events\").click();</script>";
                }

                $display_bars = $bars[$who];  //select elements to unhide based on user type.
                foreach($display_bars as $bar){

                    if($bar == "comm_name"){
                        //print all committee names' radio.
                        echo "<form action=\"\" method=\"post\">";
                        for($i = 0; $i < count($committees); $i++){
                            echo sprintf("
                                <label  for=\"%s\" ;\">
                                    <div id=\"div_%s\" style=\"display:block\">
                                        <input type=radio id=\"%s\" value=\"%s\" onchange=\"guest_committee_select(this)\" name=random_name>%s<br>
                                        <a method=\"get\" href=\"committee_events.php?c_name=".$committees[$i]["comm_name"]."\" target=\"main_frame\" id=a_%s name=a_%s style=\"display:block\"></a><br>
                                    </div>
                                </label>
                                ", $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"], $committees[$i]["comm_name"]);
                        }
                        echo "</form>";

                    } else{
                        //unhide the views by id $bars.
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