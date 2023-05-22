<?php 

require_once('database.php');


$cookie_id = filter_input(INPUT_POST, 'cookie_id', FILTER_VALIDATE_INT);

if ($cookie_id == 0 || $cookie_id == null) {
    $error = "Invalid cookie ID." . $cookie_id;
    include('error.php');
} else {
    $query = 'DELETE FROM cookie
              WHERE cookieID = :cookie_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':cookie_id', $cookie_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

include('index.php')
?>