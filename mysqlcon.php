<?php

// get database connection details from login.php else throw an error
require_once 'login.php';

// connect to the database or else die and give error message
$db_server = mysql_connect($db_hostname,$db_username,$db_password);

if (!$db_server) die("Unable to connect to MySQL: " .mysql_errno());

// select the provided database in the config file or die if not available.
mysql_select_db($db_database) or die("Unable to select database: " .mysql_errno());

//query database
$query = "SELECT * FROM customers";
$result = mysql_query($query);

if (!$result) die ("Database Access Failed: " .mysql_errno());

