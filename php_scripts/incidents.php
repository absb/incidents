<?php
	include_once 'connect.php';

	session_start();
	$_SESSION["user_id"] = 3;
	if(isset($_SESSION["user_id"]))
	{
 		$user = $_REQUEST['user_id'];
 		$res=mysql_query("SELECT * FROM incidents ORDER BY reference_number DESC");

 		$arary = array();
		while($row = mysql_fetch_assoc($res)){
	  	$arary[] = $row;
		}
 		echo $_GET["jsoncallback"] . '(' . json_encode($arary) . ');';
	} else
 		echo $_GET["jsoncallback"] . '(' . json_encode(0) . ');';
?>