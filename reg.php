<?php

	$fname =  $_POST['fname'];
	$email =  $_POST['email'];
	$uname =  $_POST['uname'];
	$pass1 =  $_POST['pass1'];
	$pass2 =  $_POST['pass2'];
	
	session_start();
		
		$_SESSION['F'] = $fname;
		$_SESSION['E'] = $email;
		
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database_name = "airline";

//establish connection mysqli object oriented
	$conn = new mysqli($servername, $username, $password, $database_name);

	if ($conn->connect_error)
		die("Connection failed: ".$conn->connect_error."<br>");
	//else
	//	 echo "Connected successfully"."<br>";
	
	
//insert query	
	$sql_insert_query = "INSERT INTO `user_data`(`fname`, `email`,`uname`, `password`, `conf_password`) VALUES ('$fname','$email','$uname','$pass1','$pass2')";
	
	
	if ($conn->query($sql_insert_query) === FALSE)
		echo "record is not created: ".$sql."<br>".$conn->error."<br>";
	
	if($conn->query($sql_insert_query) === TRUE)
		header("Location: ".'login.html');
	
	//else 
		//echo "New record created successfully"."<br>";
	
	
	
?>