<?php

$host = "localhost";
$dbname = "grocery_db";  //database name
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password); // Create connection
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✅ Database connection successful!";
} catch (PDOException $e) {
    die("❌ Connection failed: " . $e->getMessage()); // Check connection
}
?>
