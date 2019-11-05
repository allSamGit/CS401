<?php
	require_once('dbo.php');
	$dao = new Dao();
	echo $dao->getConnectionStatus();
?>