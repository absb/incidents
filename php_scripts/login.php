<?php
	include_once 'connect.php';
	session_start();

	if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
	{
 		$username = mysql_real_escape_string($_REQUEST['username']);
 		$password = md5(mysql_real_escape_string($_REQUEST['password']));
 		$res=mysql_query("SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1");
 		$row=mysql_fetch_assoc($res);
 		if($row)
 		{
 			$_SESSION["user_id"] = $row['user_id'];
 			echo $_GET["jsoncallback"] . '(' . json_encode($row['user_id']) . ');';
 		} else {
 			echo $_GET["jsoncallback"] . '(' . json_encode(0) . ');';
 		}
	}
?>