<?php
include('../conection.php');

if(!empty($_POST)){
	if(isset($_POST["documento"]) &&isset($_POST["password"])){
		if($_POST["documento"]!=""&&$_POST["password"]!=""){
			
			$db=Db::getConnect();
			$user_id=null;
			$sql1= "select * from usuarios where (documento_usua=\"$_POST[documento]\") and contrasena=\"$_POST[password]\" ";
			$query = $db->query($sql1);
			while ($r=$query->fetch()) {
				$user_id=$r["idusua"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../index.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				print "<script>window.location='../home.php';</script>";				
			}
		}
	}
}
?>