<?php

include("dbconfig.php");

// SQL query to insert a new record into Grocery_Items table
$query = "INSERT INTO Grocery_Items 
    (item_name, category_id, supplier_id, unit_price, quantity_in_stock, expiration_date) 
    VALUES (:item_name, :category_id, :supplier_id, :unit_price, :quantity_in_stock, :expiration_date)";
$stmt = $conn->prepare($query);

// bind parameters to prevent SQL injection
$stmt->bindParam(':item_name', $item_name);
$stmt->bindParam(':category_id', $category_id);
$stmt->bindParam(':supplier_id', $supplier_id);
$stmt->bindParam(':unit_price', $unit_price);
$stmt->bindParam(':quantity_in_stock', $quantity_in_stock);
$stmt->bindParam(':expiration_date', $expiration_date);

// assign values to variables
$item_name = "Chocolate Bar 50g";
$category_id = 2;  // Snacks
$supplier_id = 3;  // SnackHub
$unit_price = 35.00;
$quantity_in_stock = 150;
$expiration_date = "2027-02-10";

// execute the statement
if ($stmt->execute()) {
    echo "<h2>✅ Record inserted successfully!</h2>";
} else {
    echo "<h2>❌ Failed to insert record.</h2>";
}

// close the connection
$conn = null;
?>
