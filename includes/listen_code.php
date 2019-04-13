<?php

if (isset($_GET['y'])) {
	
	$year = $_GET['y'];
	
	include"listenYear.php?y=$year";
	
} else {
	
	include"listenDefault.php";
	
}

?>