<?php 
	ini_set('display_errors', 'On');
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu","disatapp-db","TQOOIdfsDRGWJkvj","disatapp-db");
	if($mysqli->connect_errno){
		echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}

	$did = $_GET['id'];
	$del1 = mysqli_query($mysqli, "DELETE ch FROM charname ch 
									INNER JOIN species s ON ch.specie = s.id 
									INNER JOIN planet p ON ch.planet = p.id
									LEFT JOIN episode e ON ch.f_episode = e.id
									LEFT JOIN char_prof cp ON ch.id = cp.cid
									LEFT JOIN profession pr ON cp.jid = pr.id
									WHERE ch.id = '$did'");
?>