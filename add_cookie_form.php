<?php
require('database.php');
$query = 'SELECT *
          FROM Locations
          ORDER BY LocationID';
$statement = $db->prepare($query);
$statement->execute();
$Locations = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pump Palace Cookies</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <header><h1>Cookie Manager</h1></header>

    <main>
        <h1>Add Cookie</h1>
        <form action="add_cookie.php" method="post"
              id="add_product_form">

            <label>Location:</label>
            <select name="LocationID">
            <?php foreach ($Locations as $Location) : ?>
                <option value="<?php echo $Location['LocationID']; ?>">
                    <?php echo $Location['LocationName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $Cookie['name']; ?>"><br>

            <label>Creatine:</label>
            <input type="text" name="creatine" value="<?php echo $Cookie['creatine']; ?>"><br>

            <label>Size:</label>
            <input type="text" name="size" value="<?php echo $Cookie['size']; ?>"><br>

            <label>Frosting:</label>
            <input type="text" name="Frosting" value="<?php echo $Cookie['Frosting']; ?>"><br>

            <label>Frosting Style:</label>
            <input type="text" name="FrostingStyle" value="<?php echo $Cookie['FrostingStyle']; ?>"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Cookie"><br>
        </form>
        <p><a href="index.php">View Cookie List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pump Palace</p>
    </footer>
</body>
</html>