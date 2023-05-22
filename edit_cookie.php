<?php

// Get IDs
$CookieID = filter_input(INPUT_POST, 'CookieID', FILTER_VALIDATE_INT);
$LocationID = filter_input(INPUT_POST, 'LocationID', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$creatine = filter_input(INPUT_POST, 'creatine');
$size = filter_input(INPUT_POST, 'size', FILTER_VALIDATE_FLOAT);

if($LocationID == null || $LocationID == false ||
$CookieID == null || $CookieID == false ||
$name == null || $name == null || $price == null || $price == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Edit the product in the database  
    $query = 'UPDATE Cookie
                SET LocationID = :LocationID, 
                    name = :name,
                    creatine = :creatine, 
                    size = :size
                WHERE productID = :CookieID';
    $statement = $db->prepare($query);
    $statement->bindValue(':CookieID', $CookieID);
    $statement->bindValue(':LocationID', $LocationID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':creatine', $creatine);
    $statement->bindValue(':size', $size);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>