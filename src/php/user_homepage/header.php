<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../../css/header.css">

</head>
<script>
    function f() {
        document.getElementById("hide").click();
    }
</script>
<body>
	<div class="header">
	  <a class="logo"><h2>Room <span class="span-text"> Allotment</span></h2> </a>
	  <div class="header-right">
          <a class="active" href="#home">USER</a>
          <a href="#" onclick="f()">LOGOUT</a>
          <a href="../login.php" name="hide" id="hide"></a>
	  </div>
	</div>
</body>
</html>