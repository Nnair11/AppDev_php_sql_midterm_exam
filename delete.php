<?php

include("dbconfig.php");

// SQL statement to delete a record based on its item_id
$query = "DELETE FROM Grocery_Items WHERE item_id = :item_id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':item_id', $item_id);

// specify which record you want to delete
$item_id = 2; // change this number depending on the item_id you want to remove

// execute the delete statement
if ($stmt->execute()) {
    echo "<h2>🗑️ Record with item_id = $item_id deleted successfully!</h2>";
} else {
    echo "<h2>❌ Failed to delete record.</h2>";
}

$conn = null;
?>
