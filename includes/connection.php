<?php


if(@mysql_connect('localhost','root','') && mysql_select_db('db_foxhound'))
{
	
}
else
{
	die('ERROR: DATABASE CONNECTION FAILED');
}




?>