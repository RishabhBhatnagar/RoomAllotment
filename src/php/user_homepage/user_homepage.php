<html>
    <?php
        $who = $_REQUEST['who'];
        session_start();
        echo "
            <script>
                alert('".$_SESSION["id"]."');
            </script>
        ";
        echo "
            <frameset rows=\"15%, *\" border=0>
                <frame src=\"header.php?who=".$who."\" style=\"background-color: #292c2f\" style=\"opacity: 0.9\">
                <frameset cols=\"20%, *\" border=\"0\">
                    <frame src=\"side_navigation.php?who=".$who."\">
                    <frame src=\"main_content.php?who=".$who."\" name=\"main_frame\" id=\"main_frame\">
                </frameset>
            </frameset>
        ";
    ?>
</html> 