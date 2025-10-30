<?php
include("dbconfig.php");

// SQL statement to update a record
$query = "UPDATE Grocery_Items 
          SET item_name = :item_name, 
              unit_price = :unit_price, 
              quantity_in_stock = :quantity_in_stock,
              expiration_date = :expiration_date
          WHERE item_id = :item_id";

$stmt = $conn->prepare($query);

// Bind parameters to the placeholders
$stmt->bindParam(':item_name', $item_name);
$stmt->bindParam(':unit_price', $unit_price);
$stmt->bindParam(':quantity_in_stock', $quantity_in_stock);
$stmt->bindParam(':expiration_date', $expiration_date);
$stmt->bindParam(':item_id', $item_id);

// Assign new values to update
$item_name = 'Whole Milk 1L';
$unit_price = 99.75;
$quantity_in_stock = 150;
$expiration_date = '2026-10-21';
$item_id = 1; // id of the item you wanna change

// Execute the update statement
if ($stmt->execute()) {
    echo "<h2>✅ Record with item_id = $item_id updated successfully!</h2>";
} else {
    echo "<h2>❌ Failed to update record.</h2>";
}

// Close the connection
$conn = null;
?>
