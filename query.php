<?php

// get database connection details from login.php
require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

// if connection fails throw an error
if(!$db_server) die("Unable to connect to MySQL: " .mysql_errno());

// select the database if available else throw error
mysql_select_db($db_database) or die("Unable to select database: " .mysql_errno());

// query the database
$query = "SELECT * FROM customers";
$result = mysql_query($query);

if (!$result) die("Database access failed:  " .mysql_errno());

// get the number of rows from the database query
$rows = mysql_num_rows($result);

// METHOD 1
// loop through the number of rows in the returned result and display the contents
//for ($j = 0; $j < $rows; $j++)
//{
//    echo 'Name: ' .mysql_result($result, $j,'name') .'<br>';
//    echo 'Age: ' .mysql_result($result, $j,'age') .'<br>';
//    echo 'Sex: ' .mysql_result($result, $j,'sex') .'<br>';
//
//    echo '<br>';
//}

// METHOD 2
// loop through the number of rows in the returned result and display the contents
for ($j = 0; $j < $rows ; $j++)
{
    // get a single row from the database
    $row = mysql_fetch_row($result);
    echo 'Name: ' . $row[1]. '<br>';
    echo 'Age: ' . $row[2]. '<br>';
    echo 'Sex: ' . $row[3]. '<br>';

    echo '<br>';
}

// close the connection
mysql_close($db_server);
