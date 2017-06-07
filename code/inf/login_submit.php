<?php session_start();?>

<?php
	require "../admin/sql.php";
	
	$account=$_POST["account"];
	$password=$_POST["password"];
	
	$sql="SELECT * FROM user WHERE name='".$account."' and privilege=".$_POST["type"];
    $result=mysql_query($sql);
	$count=mysql_num_rows($result);
    $row=mysql_fetch_array($result);
	
	if($count==0){
		echo 1;
	}
	else{
		if($password!=$row["password"]){
			echo 2;
		}
		else{
			$_SESSION["id"]=$row["id"];
			$_SESSION["name"]=$row["name"];
			echo 0;
		}
	}