<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// إنشاء قاعدة البيانات
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists.\n";
} else {
    echo "Error creating database: " . $conn->error;
}

// اختيار قاعدة البيانات
$conn->select_db($dbname);

// إنشاء جدول ills (المستخدمين)
$sql_ills = "CREATE TABLE IF NOT EXISTS ills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    PasswordHash VARCHAR(255) NOT NULL,
    Type ENUM('Seller', 'Buyer') NOT NULL
)";
if ($conn->query($sql_ills) === TRUE) {
    echo "Table 'ills' created successfully.\n";
} else {
    echo "Error creating table 'ills': " . $conn->error;
}

// إنشاء جدول categories (الفئات)
$sql_categories = "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL
)";
if ($conn->query($sql_categories) === TRUE) {
    echo "Table 'categories' created successfully.\n";
} else {
    echo "Error creating table 'categories': " . $conn->error;
}

// إضافة بيانات تجريبية إلى جدول ills
$password_hash_ahmed = password_hash("password123", PASSWORD_DEFAULT); // تشفير كلمة مرور أحمد
$password_hash_sara = password_hash("password123", PASSWORD_DEFAULT); // تشفير كلمة مرور سارة

$sql_insert_ills = "INSERT INTO ills (FullName, Email, PasswordHash, Type) VALUES 
('Ahmed Ali', 'ahmed@example.com', '$password_hash_ahmed', 'Buyer'),
('Sara Mohamed', 'sara@example.com', '$password_hash_sara', 'Seller')";

if ($conn->query($sql_insert_ills) === TRUE) {
    echo "Sample data inserted into 'ills' table.\n";
} else {
    echo "Error inserting data into 'ills': " . $conn->error;
}

// إضافة بيانات تجريبية إلى جدول categories
$sql_insert_categories = "INSERT INTO categories (name, image) VALUES
('Fashion', 'fashion.jpg'),
('Electronics', 'electronics.jpg'),
('Home Appliances', 'home_appliance.jpg'),
('Books', 'books.jpg')";

if ($conn->query($sql_insert_categories) === TRUE) {
    echo "Sample data inserted into 'categories' table.\n";
} else {
    echo "Error inserting data into 'categories': " . $conn->error;
}

// غلق الاتصال
$conn->close();
?>
