<?php

	$date1 = $_POST['date1'];
	$date2= $_POST['date2'];

	header('Location: ../view/reportpage?q='.$date1."+".$date2);

?>