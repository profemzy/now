<?php
require_once 'login.php';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server) die('Unable to connect to MySQL: '  .mysql_errno());

mysql_select_db($db_database, $db_server) or die('Unable to select database: ' .mysql_errno());

if (isset($_POST['delete']) && isset($_POST['id']))
{
    $id = get_post('id');
    $query = "DELETE FROM customers  WHERE id='$id' ";

    if (!mysql_query($query, $db_server))
        echo "DELETE failed: $query<br> " .mysql_errno() . "<br><br>";
}

if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['sex']))
{
    $name = get_post('name');
    $age = get_post('age');
    $sex = get_post('sex');

//    $query = "INSERT INTO customers VALUES" .
//        "('$name', '$age', '$sex')";

    $query = "INSERT INTO customers (name, age, sex) VALUES ('$name', '$age', '$sex')";

    if(!mysql_query($query, $db_server))
        echo "INSERT failed: $query<br>" .mysql_errno() . "<br><br>";
}

echo <<<_END
<form action="sqltest.php" method="post"><pre>
    Name <input type="text" name="name" >
    Age <input type="text" name="age" >
    Sex <input type="text" name="sex" >
    <input type="submit" value="ADD RECORD">
    </pre>
</form>
_END;

$query = "SELECT * FROM customers";

$result = mysql_query($query);

if(!$result) die("Database Access Failed: " .mysql_errno());
$rows = mysql_num_rows($result);

for ($j = 0; $j < $rows; ++$j)
{
    $row = mysql_fetch_row($result);
    echo <<<_END
    <pre>
        Name $row[1]
        Age $row[2]
        Sex $row[3]
     </pre>
     <form action="sqltest.php" method="post">
     <input type="hidden" name="delete" value="yes">
     <input type="hidden" name="id" value="$row[0]">
     <input type="submit" value="DELETE RECORD">
     </form>
_END;

}

mysql_close($db_server);

function get_post($var)
{
    return mysql_real_escape_string($_POST[$var]);
}