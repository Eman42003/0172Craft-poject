<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "categories";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<img src='images/" . $row["image"] . "' alt='" . $row["name"] . "' style='width:100px;'>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>