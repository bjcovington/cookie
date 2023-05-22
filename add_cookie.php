<?php
// Get the product data
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($LocationID == null || $LocationID == false ||
        $name == null || $creatine == null || $size == null || $Frosting == null || $FrostingStyle == null) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO Cookie
                 (LocationID, name, creatine, size, Frosting, FrostingStyle)
              VALUES
                 (:LocationID, :name, :creatine, :size, :Frosting, :FrostingStyle)';
    $statement = $db->prepare($query);
    $statement->bindValue(':LocationID', $LocationID);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':creatine', $creatine);
    $statement->bindValue(':size', $size);
    $statement->bindValue(':Frosting', $Frosting);
    $statement->bindValue(':FrostingStyle', $FrostingStyle);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>