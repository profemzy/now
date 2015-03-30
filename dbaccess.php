<?php
if (isset($_GET['search'])) {
    try {
        require_once 'includes/pdo_connect.php';
        $sql = 'SELECT *
                FROM customers
                ORDER BY name';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':name', '%' . $_GET['name'] . '%');
        $stmt->bindParam(':sex', $_GET['sex'], PDO::PARAM_STR);
        $stmt->execute();
        $errorInfo = $stmt->errorInfo();
        if (isset($errorInfo[2])) {
            $error = $errorInfo[2];
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Named Parameters</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="container">
<h1>PDO Prepared Statement: Named Parameters</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
} ?>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Search for Customers</legend>
        <p>
            <label for="name">Name: </label>
            <input type="text" name="name" id="name">

            <input type="submit" name="search" value="Search">
        </p>
    </fieldset>
</form>
<?php if (isset($_GET['search'])) {
    $row = $stmt->fetch();
    if ($row) {
        ?>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Age (Years)</th>
                <th>Sex</th>
            </tr>
            <?php do { ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                </tr>
            <?php } while ($row = $stmt->fetch()); ?>
        </table>
    <?php } else {
        echo '<p>No results found.</p>';
    } } ?>
</body>
</html>