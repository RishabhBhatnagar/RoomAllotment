<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/header.css">
    </head>
    <body>
        <?php
          include '../../data/get_data.php';
          session_start();

          //$value=get_table_data_query("select comm_name from user where uid=".$_SESSION['uid'].";")[0]["comm_name"];

          if ($_SESSION['uid']==-1) {
            $value="GUEST";
          }
          else{
            $value=get_table_data_query("select comm_name from user where uid=".$_SESSION['uid'].";")[0]["comm_name"]; 
            $value=strtoupper($value);

          }

        ?>
        <div class="header">
          <a><h2>Room <span class="span-text"> Allotment</span></h2> </a>
          <div class="header-right">
              <span class="span_tou_1"><a class="type-of-user" href="#home"><?php echo "$value"?></a></span>
              <span class="span_tou"><a class="log-out" href="logout.php" id="logout">LOGOUT</a></span>
          </div>
        </div>
        
    </body>
</html>