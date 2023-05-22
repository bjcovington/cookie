<?php
require('database.php');


$CookieID = filter_input(INPUT_POST, 'CookieID', FILTER_VALIDATE_INT);

if (!isset($LocationID)) {
    $LocationID = filter_input(INPUT_GET, 'LocationID', 
            FILTER_VALIDATE_INT);
    if ($LocationID == NULL || $LocationID == FALSE) {
        $LocationID = 1;
    }
}

$query = 'SELECT *
          FROM Locations
          ORDER BY LocationID';
$statement = $db->prepare($query);
$statement->execute();
$Locations = $statement->fetchAll();
$statement->closeCursor();

$queryCookies = 'SELECT *
                  FROM cookie
                  WHERE CookieID = :CookieID';
$statement3 = $db->prepare($queryCookies);
$statement3->bindValue(':CookieID', $CookieID);
$statement3->execute();
$Cookies = $statement3->fetch();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Pump Palace Cookies</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Cookie Manager</h1></header>

    <main>
        <h1>Edit Cookie</h1>
        <form action="edit_product.php" method="post"
              id="edit_product_form">
            
            <input type="hidden" name="CookieID" value="<?php echo $Cookie['CookieID']; ?>">

            <label>Location ID:</label>
            <input type="text" name="LocationID" value="<?php echo $Cookie['LocationID']; ?>"><br>
            
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
            <input type="submit" value="Submit Changes"><br>
        </form>
        <p><a href="index.php">View Cookies List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pump Palace Cookies</p>
    </footer>
</body>
</html>