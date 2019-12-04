<?php
	include('../controller/LicenceGenerator.php');
	include('../controller/AdeleyeMySql.php');

	
	$lgname = $_POST['localgov'];
	$platenum = $_POST['platenum'];
	// echo $lgname."<br>";
	$adeleye2 = new LicenceGenerator();

	$adeleye1 = new AdeleyeMySql();

	$_SESSION['lgname'] = $lgname;
	// session_start();

		if($_SESSION['lgname'] == $lgname){
			if(!isset($_SESSION['counter']) && !isset($_SESSION['alphacounter1']) && !isset($_SESSION['alphacounter2'])) {
				
				$_SESSION['counter']=0;
				$_SESSION['alphacounter1'] =65;
				$_SESSION['alphacounter2'] =64;
			}
		}
		else{
			session_destroy();
			session_start();
			$_SESSION['lgname'] = $lgname;
			$_SESSION['counter']=0;
			$_SESSION['alphacounter1'] =65;
			$_SESSION['alphacounter2'] =64;
		}

	$result = $adeleye2->generatenumber($lgname,$platenum);

	
	if($adeleye1->connections("localhost","root","","LicenceGenerate")){
		echo "connection established!!";
	}

	echo "<br>";
	// print_r($result);
	// $q= $result[0]."+".$result[1]."+".$result[2];
	$q="";
	for ($i=0; $i <count($result) ; $i++) { 
		$currdate = date("Y-m-d");
		$q .= $result[$i]."+";
		echo $result[$i]." ".$currdate."<br/>";
		

		$query = "INSERT INTO logtable (platenum, dates) VALUES('".$result[$i]."','".$currdate."')";

		if($adeleye1->connectDB($query)){
			// echo "data inserted!!!";
		}
	}
	// echo $q;
	header('Location:../view/licenseplating.php?q='.$q);
?>