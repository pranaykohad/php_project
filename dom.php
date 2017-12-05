<?php
	
	$R1             = $_POST['r1'];
	$FROM           = $_POST['from'];
	$TO             = $_POST['to'];
	$DATE_GO        = $_POST['date_go'];
	$DATE_COME      = $_POST['date_come'];
	$ADULT_COUNT    = $_POST['adult_count'];
	$CHILDREN_COUNT = $_POST['children_count'];
	$SEATING_CLASS  = $_POST['seating_class'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database_name = "airline";

//establish connection
	$conn = new mysqli($servername, $username, $password, $database_name);

	if ($conn->connect_error) 
		die("Connection failed: ".$conn->connect_error."<br>");
	else
		echo "Connected successfully"."<br>";
	
	
//insert query	
	$sql_insert_query = "INSERT INTO `airdata`(`tic_type1`, `from1`, `to1`, `date_go1`, `date_come1`, `adult1`, `children1`, `seat_type1`) VALUES ('$R1','$FROM','$TO','$DATE_GO','$DATE_COME','$ADULT_COUNT','$CHILDREN_COUNT','$SEATING_CLASS')";
	
	
	if ($conn->query($sql_insert_query) === TRUE){
		session_start();
		$_SESSION['R2']              = $R1;
		$_SESSION['FROM2']           = $FROM;
		$_SESSION['TO2']             = $TO;
		$_SESSION['DATE_GO2']        = $DATE_GO;
		$_SESSION['DATA_COME2']      = $DATE_COME;
		$_SESSION['ADULT_COUNT2']    = $ADULT_COUNT;
		$_SESSION['CHILDREN_COUNT2'] = $CHILDREN_COUNT;
		$_SESSION['SEATING_CLASS2']  = $SEATING_CLASS;
	
		header("Location: ".'ticket_display.php');
	}	
	else 
		echo "record is not created: ".$sql."<br>".$conn->error."<br>";
?>