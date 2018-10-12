<html>
    <?php
        function toast($stri)
        {

            echo "<script>
                alert('$stri');
                </script>";

        }
        if(isset($_REQUEST["who"])){
            echo "<input type='hidden' name=guest value='g'>";
        }

        echo "
            <frameset rows=\"15%, *\" border=0>
                <frame src=\"header.php\" style=\"background-color: #292c2f\" style=\"opacity: 0.9\">
                <frameset cols=\"20%, *\" border=\"0\">
                    <frame src=\"side_navigation.php\">
                    <frame src=\"main_content.php\" name=\"main_frame\" id=\"main_frame\">
                </frameset>
            </frameset>
        ";
    ?>
</html> 