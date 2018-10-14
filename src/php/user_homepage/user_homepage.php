<html>
    <!--
        There are two ways in which one can land here :
            1) Directly from login page when user is a guest.
            2) Validated person when user is either an admin or a committee head.
    -->
    <?php
        include "../../data/get_data.php";
        session_start();
        if(!isset($_SESSION["uid"])){
            toast("Sorry, you are not authenticated, Login first");
            echo "
                <script>
                    window.location.href = '../login.php';
                </script>
            ";
        }
    ?>
    <frameset rows="15%, *" border=0>
        <frame src="header.php" style="background-color: #292c2f; opacity: 0.9">
        <frameset cols="20%, *" border="0">
            <frame src="side_navigation.php">
            <frame src="main_content.php" name="main_frame" id="main_frame">
        </frameset>
    </frameset>
</html>