<link rel="stylesheet" type="text/css" href="../../css/snackbar.css">

<?php 

include "../../data/get_data.php";
require 'same_copy_paste.php';

$quest1=$_REQUEST['q1'];
$quest2=$_REQUEST['q2'];
$quest3=$_REQUEST['q3'];
$quest4=$_REQUEST['q4'];

//insertion in feedback form
get_table_data_query("insert into feedback values('$quest1', '$quest2', '$quest3', '$quest4');");

//show_snackbar("Thank you for the Response!!!");
    echo "
    <script>
        window.history.back();
        window.history.back();
    </script>";

    show_snackbar("Thank you for the Response!!!");

?>