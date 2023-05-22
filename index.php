<?php 
require_once('database.php');

if (!isset($LocationID)) {
    $LocationID = filter_input(INPUT_GET, 'LocationID', FILTER_VALIDATE_INT);
}

$queryLocation = 'SELECT * FROM Locations
                  WHERE LocationID = :LocationID';
$statement1 = $db->prepare($queryLocation);
$statement1->bindValue(':LocationID', $LocationID);
$statement1->execute();
$Location = $statement1->fetch();
$LocationName = $Location['LocationName'];
$statement1->closeCursor();

$query = 'SELECT * FROM Locations
                       ORDER BY LocationID';
$statement = $db->prepare($query);
$statement->execute();
$Locations = $statement->fetchAll();
$statement->closeCursor();

$queryCookie = 'SELECT * FROM CookieLocation
                  JOIN Cookie ON CookieLocation.CookieID = Cookie.CookieID
                  WHERE LocationID = :LocationID
                  ORDER BY CookieID';
$statement3 = $db->prepare($queryCookie);
$statement3->bindValue(':LocationID', $LocationID);
$statement3->execute();
$Cookie = $statement3->fetchAll();
$statement3->closeCursor();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css" />
    <title>Pump Palace</title>
</head>
<body>
<header><h1>Pump Palace Cookies</h1></header>
<main>
    <h1>Product List</h1>

    <aside>
        <h2>Locations</h2>
        <nav>
        <ul>
            <?php foreach ($Locations as $Location) : ?>
            <li><a href=".?LocationID=<?php echo $Location['LocationID']; ?>">
                    <?php echo $Location['LocationName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>          
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $LocationName; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Ingredient</th>
                <th>Creatine</th>
                <th>Size</th>
                <th>Frosting</th>
                <th>Frosting Style</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($Cookie as $Cookies) : ?>
            <tr>
                <td><?php echo $Cookies['name']; ?></td>
                <td><?php echo $Cookies['ingredient']; ?></td>
                <td><?php echo $Cookies['creatine']; ?></td>
                <td><?php echo $Cookies['size']; ?></td>
                <td><?php echo $Cookies['Frosting']; ?></td>
                <td><?php echo $Cookies['FrostingStyle']; ?></td>
                <td><form action="delete_cookie.php" method="post">
                    <input type="hidden" name="CookieID"
                           value="<?php echo $Cookie['CookieID']; ?>">
                    <input type="hidden" name="LocationID"
                           value="<?php echo $Cookie['LocationID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
                <td><form action="edit_cookie_form.php" method="post">
                    <input type="hidden" name="CookieID"
                           value="<?php echo $Cookie['CookieID']; ?>">
                    <input type="hidden" name="LoactionID"
                           value="<?php echo $Cookie['LocationID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_cookie_form.php">Add Cookie</a></p>       
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Pump Palace</p>
</footer>
</body>
</html>