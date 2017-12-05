<?php
	session_start();
	$R3              = $_SESSION['R2'];
	$FROM3	         = $_SESSION['FROM2'];
	$TO3	         = $_SESSION['TO2'];
	$DATA_GO3	     = $_SESSION['DATE_GO2'];
	$DATA_COME3	     = $_SESSION['DATA_COME2'];
	$ADULT_COUNT3	 = $_SESSION['ADULT_COUNT2'];
	$CHILDREN_COUNT3 = $_SESSION['CHILDREN_COUNT2'];
	$SEATING_CLASS3	 = $_SESSION['SEATING_CLASS2'];
	
	$id=rand().rand();
	
	
	$FNAME22 = $_SESSION['F'];
	$EMAIL22 = $_SESSION['E'];


	$COST = null;
	static $AMT = null;
	
	$s = "NOTE:";
	$s2 = "*ECONOMY: cost + 200";
	$s2 = "*EXCLUIVE: cost + 300";
	$s3 = "*FIRST: cost + 400";
	$s4 = "*PREMIUM: cost + 500";
	
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database_name = "airline";
	
	
	$db = new mysqli($servername, $username, $password, $database_name);
	
	$sql = "SELECT * FROM cities";
	
	if($result = $db->query($sql)){

		while($rows = $result->fetch_assoc()){
		
		
			if(($FROM3 == $rows['from3']) && ($TO3 == $rows['to3'])){
				$COST = $rows['cost3'];
				
				$AMT = ($ADULT_COUNT3 * $rows['cost3']) + (0.5 * $CHILDREN_COUNT3 * $rows['cost3']);
	
				if($R3 === "return")
					$AMT = $AMT * 2;
					
				if($SEATING_CLASS3 === "Economy" )
					$AMT = $AMT + 200 +(0.1 * $COST);
				else if($SEATING_CLASS3 === "Exclusive")
					$AMT = $AMT + 300 +(0.11 * $COST);
				else if($SEATING_CLASS3 === "First class")
					$AMT = $AMT + 400 +(0.12 * $COST);
				else if($SEATING_CLASS3 === "premium class")
					$AMT = $AMT + 500 +(0.13 * $COST);
			}		
		}
	}


	include "fpdf/fpdf.php";
	
	$pdf = new FPDF();
	$pdf->addpage();
	$pdf->setfont("Arial","B",25);

	
	$pdf->image("1024px-Air_India_Logo.jpg",50,35,100,35);
	
	$pdf->settextcolor(240,15,15);
	$pdf->setdrawcolor(160,0,255);
	
	$pdf->multicell(0,20,'AIR INDIA     E-TICKET',1,"C");
	
	$pdf->multicell(0,50,'',"C");
	
	$pdf->settextcolor(255,160,2);
	$pdf->setfont("Arial","B",20);
	
	$pdf->cell(0,10,'NAME: '.$FNAME22,1,1,"C");
	$pdf->cell(0,10,'EMAIL: '.$EMAIL22,1,1,"C");
	$pdf->cell(0,10,'ID: '.$id,1,1,"C");
	$pdf->cell(0,10,'RETURN TYPE: '.$R3,1,1,"C");
	$pdf->cell(0,10,'FROM: '.$FROM3,1,1,"C");
	$pdf->cell(0,10,'TO: '.$TO3,1,1,"C");
	$pdf->cell(0,10,'DEPARTING: '.$DATA_GO3,1,1,"C");
	$pdf->cell(0,10,'RETURNING: '.$DATA_COME3,1,1,"C");
	$pdf->cell(0,10,'ADULTS: '.$ADULT_COUNT3,1,1,"C");
	$pdf->cell(0,10,'CHILDREN: '.$CHILDREN_COUNT3,1,1,"C");
	$pdf->cell(0,10,'CLASS: '.$SEATING_CLASS3,1,1,"C");
	$pdf->cell(0,10,'COST FOR ADULT: '.$COST,1,1,"C");
	$pdf->cell(0,10,'COST FOR CHILD: '.($COST*0.5),1,1,"C");
	$pdf->cell(0,10,'AMOUNT: '.$AMT,1,1,"C");
	
	
	
	$pdf->addpage();
	$pdf->settextcolor(233,4,4);
	$pdf->setfont("Arial","B",15);
	$pdf->cell(0,10,$s,0,1,"C");
	$pdf->cell(0,10,$s2,1,1,"C");
	$pdf->cell(0,10,$s3,1,1,"C");
	$pdf->cell(0,10,$s4,1,1,"C");
	
	
	$pdf->output();
//	session_destroy();
?>