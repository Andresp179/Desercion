<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>alert(\"Acceso invalido!\");window.location='login.php';</script>";
	var_dump($con);
}

?>
<html>
	<head>	
		<title> Principal .</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Bienvenido</h2>

</div>
</div>
</div>
	</body>
</html>