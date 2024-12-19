<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "categories";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($xampphtdocsHomemedhomemed_projectimages);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($imageFileType != "png") {
        echo "Sorry, only PNG files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO categories (name, image) VALUES ('$name', '$image')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <label for="name">Category Name:</label>
    <input type="text" name="name" required>
    <label for="image">Select Image (PNG only):</label>
    <input type="file" name="image" accept="image/png" required>
    <input type="submit" value="Add Category">
</form>