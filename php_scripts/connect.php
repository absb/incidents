<?php
	if(!mysql_connect("localhost","db_username","db_password"))
	{
     	die('oops connection problem ! --> '.mysql_error());
	}
	if(!mysql_select_db("halityow_api"))
	{
     	die('oops database selection problem ! --> '.mysql_error());
	}
	return new stdClass();
?>