<?php
include("dbconfig.php");

// Prepare and execute query
$sql = "SELECT * FROM Grocery_Items";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Fetch all records at once
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display neatly
echo "<h2>All Grocery Items</h2>";
echo "<pre>";
print_r($results);
echo "</pre>";

// Close connection
$conn = null;
?>
