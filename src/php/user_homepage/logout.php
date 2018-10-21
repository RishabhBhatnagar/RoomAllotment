<a href="../login.php" id="login" name="login" target="_blank"></a>
<?php
/**
 * Created by PhpStorm.
 * User: RishabhBhatnagar
 * Date: 13/10/18
 * Time: 8:32 AM
 */

    session_start();
    session_unset();
?>
<script>
    self.parent.location = "../login.php";
</script>

