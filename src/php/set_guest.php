<html>
    <body>
        <a href="user_homepage/user_homepage.php" id="redirect_homepage">
    </body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: BhatnagarRishabh
 * Date: 13/10/18
 * Time: 7:55 AM
 */

    session_start();
    $_SESSION["guest"] = true;
    $_SESSION["uid"] = -1;
    //Now, guest is set and user can be redirected to homepage.

    echo "
        <script>
            document.getElementById('redirect_homepage').click();
        </script>
    ";
?>