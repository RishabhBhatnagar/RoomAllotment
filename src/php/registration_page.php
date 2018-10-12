
<html>
<?php
    include "../data/get_data.php";
    session_start();
    $uname = $_REQUEST["username"];
    $pswd = trim($_REQUEST["password"]);
    $hashed = hash('sha512', $pswd);
    $user_data = get_table_data_query("select * from user where comm_name = '$uname' and pswd = '$hashed'; ");


    $_SESSION["id"] = $user_data[0]["id"];

    echo "
        <input type=\"hidden\" name=\"username\" value=\"".$_REQUEST["username"]."\">
        <input type=\"hidden\" name=\"password\" value=\"".$_REQUEST["password"]."\">
        <input type=\"hidden\" name=\"id\" value=\"".$user_data[0]["uid "]."\">
    ";

    if(!$user_data){
        echo "
                        <script>
                            alert('not found');
                            window.history.back();
                        </script>
                        ";
    }
    else{
        echo "				
                            <form action=\"user_homepage/user_homepage.php\" method=\"post\">
                                <input type=\"hidden\" name=\"who\" value=".$user_data[0]['type_of_user'].">
                                <input type=submit id=tp>
                            </form>
                        ";
        echo "				
                            <script type=\"text/javascript\">
                                document.getElementById(\"tp\").click();
                            </script>
                        ";
    }
?>
</html>