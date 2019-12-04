<?php

	include('../controller/LicenceGenerator.php');

	$adeleye = new LicenceGenerator();
	$result = $adeleye->destroy_session();

	header('Location:../view/licenseplating.php');

?>