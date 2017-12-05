<?php

	$U = $_POST['uname'];
	$P = $_POST['pass'];
	

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database_name = "airline";
	
	
	$db = new mysqli($servername, $username, $password, $database_name);
	
	$sql = "SELECT * FROM user_data";
	
	if($result = $db->query($sql)){

		while($rows = $result->fetch_assoc()){
		
		
			if(($U == $rows['uname']) && ($P == $rows['password'])){
				$UNAME    = $rows_data['uname'];
				$PASSWORD    = $rows_data['password'];
				
				
				$FNAME11    = $rows_data['fname'];
				$EMAIL11    = $rows_data['email'];
				
				session_start();
				$_SESSION['FNAME11'] = $FNAME11;
				$_SESSION['EMAIL11'] = $EMAIL11;
				
				header("Location: ".'dom.html');	
			}		
			else{
				header("Location: ".'login.html');
			}
		}
	}
?>		
	
