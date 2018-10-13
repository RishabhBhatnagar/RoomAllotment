<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../css/header.css">
    </head>

    <?php
        echo "
            <script>
                function logout() {
                    alert(\"zzd\");
                    ".session_unset()."
                }
            </script>
        ";
    ?>
    <body>
        <div class="header">
          <a class="logo"><h2>Room <span class="span-text"> Allotment</span></h2> </a>
          <div class="header-right">
              <a class="active" href="#home">USER</a>
              <a href="../login.php" id="logout" onclick="logout()">LOGOUT</a>
          </div>
        </div>
    </body>

</html>