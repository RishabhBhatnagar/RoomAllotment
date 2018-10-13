<html>
    <?php
        include "../data/get_data.php";
        session_start();
        $uname = $_REQUEST["username"];
        $pswd = trim($_REQUEST["password"]);
        $hashed = hash('sha512', $pswd);
        $user_data = get_table_data_query("select * from user where comm_name = '$uname' and pswd = '$hashed'; ");

        if(!$user_data){
            //no such user exists.
            echo "
                <script>
                    alert('not found');
                    
                    // go back one page to login form.
                    window.history.back();
                </script>
                ";
        }
        else{
            //user is found.

            /*
                when user is found, set session variable to send id of the user
                didn't use username and password for security reasons.
            */

            $_SESSION["uid"] = $user_data[0]["uid"];

            echo "				
                <form action=\"user_homepage/user_homepage.php\" method=\"post\">
                
                    <!-- Temporary submit type to load user_homepage -->
                    <input type=submit id=tp>
                </form>
                <script>document.getElementById(\"tp\").click();</script>
            ";
        }
    ?>
</html>