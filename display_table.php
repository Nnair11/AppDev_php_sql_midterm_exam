<?php

include("dbconfig.php");

// SQL query to get grocery items with their category and supplier names
$query = "SELECT g.item_id, g.item_name, c.category_name, s.supplier_name, 
                 g.unit_price, g.quantity_in_stock, g.expiration_date
          FROM Grocery_Items g
          LEFT JOIN Categories c ON g.category_id = c.category_id
          LEFT JOIN Suppliers s ON g.supplier_id = s.supplier_id
          ORDER BY g.item_id ASC";

$stmt = $conn->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Website design -->
<!DOCTYPE html> 
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Grocery Inventory</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 40px;
        }

        table {
            width: 85%;
            margin: 40px auto;
            border-collapse: collapse;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            background-color: white;
        }

        th, td {
            padding: 14px 16px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0078D7;
            color: white;
            font-size: 16px;
            text-transform: uppercase;
        }

        tr:hover {
            background-color: #f1f9ff;
            transition: 0.3s;
        }

        td {
            font-size: 15px;
            color: #444;
        }

        footer {
            text-align: center;
            margin-bottom: 30px;
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h2>🛒 Grocery Inventory Table</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Category</th>
        <th>Supplier</th>
        <th>Unit Price (₱)</th>
        <th>Stock</th>
        <th>Expiration Date</th>
    </tr>

    <?php
    // Loop through each record and display in a table row
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>{$row['item_id']}</td>";
        echo "<td>{$row['item_name']}</td>";
        echo "<td>{$row['category_name']}</td>";
        echo "<td>{$row['supplier_name']}</td>";
        echo "<td>" . number_format($row['unit_price'], 2) . "</td>";
        echo "<td>{$row['quantity_in_stock']}</td>";
        echo "<td>{$row['expiration_date']}</td>";
        echo "</tr>";
    }
    ?>
</table>

<footer> Application Development Midterm Examination | Punzalan </footer>
<footer> Grocery Management System | PHP + MySQL </footer>

</body>
</html>

<?php

$conn = null;
?>