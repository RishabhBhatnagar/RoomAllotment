<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/side_navigation.css">
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
        <div class="side-nav" id="previous_events" style="display:none;">
        <a href = "previous_events.php" target="main_frame" >Previous Events</a><br>
        </div>
        <div class="side-nav" id="pending_events" style="display:none;">
        <a href = "pending_events.php"  target="main_frame">Pending Events</a><br>
        </div>
        <div class="side-nav" id="new_events" style="display:none;">
        <a href = "new_events.php"  target="main_frame">New Events</a><br>
        </div>
        <div class="side-nav" id="rejected_events" style="display:none;" >
        <a href = "rejected.php"  target="main_frame">Rejected Events</a><br>
        </div>
        <div class="side-nav" id="accepted_events" style="display:none;">
        <a href = "acepted.php"  target="main_frame">Accepted Events</a><br>
        </div>
        <div class="side-nav" id="feedback_form" style="display:none;">
        <a href = "feedback.php" target="main_frame">Feedback Form</a><br>
        </div>

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
            "a" => array("pending_events", "acepted", "rejected_events", "accepted_events", "feedback_form"),
            "u" => array("previous_events", "pending_events", "new_events", "feedback_form"),
            "g" => array("comm_name", "feedback_form")
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

                if(in_array($who, array("a" ))){
                    echo "<script>document.getElementById(\"pending_events\").click();</script>";
                }
                if($who == 'u'){
                    echo "<script>document.getElementById(\"new_events\").click();</script>";
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