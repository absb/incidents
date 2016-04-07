<?php include_once 'connect.php';

	if(isset($_REQUEST['summary']))
	{
 		$summary = mysql_real_escape_string($_REQUEST['summary']);
 		$user_id = mysql_real_escape_string("1");
 
 		if(mysql_query("INSERT INTO incidents (summary, user_id) VALUES('$summary', '$user_id')") === TRUE)
 		{
 			echo $_GET["jsoncallback"] . '(' . json_encode(1) . ');';
 		}
 		else
 		{
 			echo $_GET["jsoncallback"] . '(' . json_encode(0) . ');';
 		}
	}

?>