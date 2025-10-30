<?php
// include your database configuration file
include("dbconfig.php");

// Prepare a SQL statement to get ONE specific grocery item
// For example, get the item with item_id = 1
$query = "SELECT * FROM Grocery_Items WHERE item_id = :id";
$stmt = $conn->prepare($query);

// Bind the parameter to prevent SQL injection
$stmt->bindParam(':id', $item_id);
$item_id = 1; 

$stmt->execute();

// Fetch a single record (the first one returned)
$result = $stmt->fetch(PDO::FETCH_ASSOC); // FETCH_ASSOC returns an associative array

// dislplay neatness
echo "<h2>Single Grocery Item</h2>";
echo "<pre>";
print_r($result);
echo "</pre>";

// Close connection
$conn = null;
?>
