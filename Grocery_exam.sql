CREATE DATABASE grocery_db;
USE grocery_db;

CREATE TABLE Categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE Suppliers (
    supplier_id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(150) NOT NULL,
    contact_email VARCHAR(150),
    phone_number VARCHAR(20),
    address TEXT
);

CREATE TABLE Grocery_Items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(150) NOT NULL,
    category_id INT,
    supplier_id INT,
    unit_price DECIMAL(10,2),
    quantity_in_stock INT,
    expiration_date DATE,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_available BOOLEAN DEFAULT TRUE,

    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
        ON UPDATE CASCADE ON DELETE SET NULL,
    FOREIGN KEY (supplier_id) REFERENCES Suppliers(supplier_id)
        ON UPDATE CASCADE ON DELETE SET NULL
);

INSERT INTO Categories (category_name, description) VALUES
('Dairy', 'Milk-based products'),
('Snacks', 'Packaged snack foods'),
('Beverages', 'Cold drinks and juices'),
('Produce', 'Fresh fruits and vegetables');

INSERT INTO Suppliers (supplier_name, contact_email, phone_number, address) VALUES
('FreshFields Distributors', 'sales@freshfields.com', '09171234567', 'Makati City, PH'),
('Oceanic Beverages', 'contact@oceanicbev.com', '09981234567', 'Pasig City, PH'),
('SnackHub', 'info@snackhub.ph', '09051234567', 'Quezon City, PH');

INSERT INTO Grocery_Items (item_name, category_id, supplier_id, unit_price, quantity_in_stock, expiration_date)
VALUES
('Whole Milk 1L', 1, 1, 89.50, 120, '2025-06-15'),
('Cheddar Cheese 250g', 1, 1, 135.00, 50, '2025-03-20'),
('Potato Chips BBQ', 2, 3, 59.00, 200, '2026-01-01'),
('Orange Juice 1L', 3, 2, 120.00, 80, '2025-05-01'),
('Apples (1kg)', 4, 1, 95.00, 60, '2025-12-01');


SELECT 
    c.category_name,
    SUM(g.unit_price * g.quantity_in_stock) AS total_stock_value,
    COUNT(DISTINCT g.supplier_id) AS supplier_count,
    SUM(g.quantity_in_stock) AS total_items
FROM Grocery_Items g
JOIN Categories c ON g.category_id = c.category_id
GROUP BY c.category_name
ORDER BY total_stock_value DESC;


