<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "graduation_project"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $category = $_POST['category'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $agree = isset($_POST['agree']) ? 1 : 0;
    $submit = $_POST['submit'];

   
    $imagePaths = [];
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $filename = basename($_FILES['images']['name'][$key]);
            $targetFilePath = "uploads/" . $filename;
            if (move_uploaded_file($tmp_name, $targetFilePath)) {
                $imagePaths[] = $targetFilePath;
            }
        }
    }

   
    $images = implode(",", $imagePaths);

    
    $stmt = $conn->prepare("INSERT INTO ads (images, category, title, price, agreed) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdi", $images, $category, $title, $price, $agree);

    if ($stmt->execute()) {
        echo "Ad successfully posted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
