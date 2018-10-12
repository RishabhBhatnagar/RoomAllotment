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
?>
<div style="">
    <a method="get" href="previous_events.php?id=<?php echo $_REQUEST["id"] ?>" target="main_frame" id="previous_events" name="previous_events" style="display:none">Previous Events</a><br>
    <a href = "../admin_page.php?id=<?php echo $_REQUEST["id"] ?>" target="main_frame" method="get" id = pending_events name = "pending_events" style="display:none">Pending Events</a>
    <a href = "new_events.php" target="main_frame" id ="new_events" name = "new_events" style="display:none">New Events</a><br>
    <a method="get" href="rejected.php?id=<?php echo $_REQUEST["id"] ?>" target="main_frame" id="rejected_events" name="rejected_events" style="display:none">Rejected Events</a><br>
    <a method="get" href="acepted.php?id=<?php echo $_REQUEST["id"] ?>" target="main_frame" id="accepted_events" name="accepted_events" style="display:none">Accepted Events</a><br>

    <?php
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


if(isset($_REQUEST["who"])){

    if($_REQUEST["who"] == "a"){
        echo "
                        <script>
                            document.getElementById(\"pending_events\").click();
                        </script>
                    ";
    }
    if($_REQUEST["who"] == "u"){
        echo "
                        <script>
                            document.getElementById(\"pending_events\").click();
                        </script>
                    ";
    }


    $display_bars = $bars[$_REQUEST["who"]];

    foreach($display_bars as $bar){

        if($bar == "comm_name"){
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
