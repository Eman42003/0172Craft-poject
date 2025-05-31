<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "graduation_project";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("You must be logged in to upload a product.")</script>';
    header('refresh:1; url= login.php');
    exit();
}

$USER_ID = $_SESSION['user_id'];

if (isset($_POST['upload'])) {
    $CATEGORY_ID = mysqli_real_escape_string($con, $_POST['category_id']);
    $NAME = mysqli_real_escape_string($con, $_POST['name']);
    $PRICE = mysqli_real_escape_string($con, $_POST['price']);
    $IMAGE = $_FILES['image'];

    $IMAGE_LOCATION = $_FILES['image']['tmp_name'];
    $IMAGE_NAME = basename($_FILES['image']['name']);
    $IMAGE_UP = "images/" . $IMAGE_NAME;

    if (empty($NAME)) {
        echo '<script>alert("Please enter the product name")</script>';
        header('refresh:1; url= upload.php');
        exit();
    } elseif (empty($PRICE)) {
        echo '<script>alert("Please enter the product price")</script>';
        header('refresh:1; url= upload.php');
        exit();
    } elseif (empty($IMAGE_LOCATION)) {
        echo '<script>alert("Please upload the product image")</script>';
        header('refresh:1; url= upload.php');
        exit();
    } elseif (empty($CATEGORY_ID)) {
        echo '<script>alert("Please select a category")</script>';
        header('refresh:1; url= upload.php');
        exit();
    } else {
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = strtolower(pathinfo($IMAGE_NAME, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowed_extensions)) {
            echo '<script>alert("Invalid file type. Only JPG, JPEG, PNG, GIF are allowed.")</script>';
            header('refresh:1; url= upload.php');
            exit();
        }

        if ($_FILES['image']['size'] > 2000000) {
            echo '<script>alert("File size exceeds the 2MB limit")</script>';
            header('refresh:1; url= upload.php');
            exit();
        }

        if (!is_dir('images')) {
            mkdir('images', 0755, true);
        }

        if (move_uploaded_file($IMAGE_LOCATION, $IMAGE_UP)) {
            // ✅ جملة INSERT بعد تضمين user_id
            $INSERT = "INSERT INTO products (name, price, image, category_id, user_id)
                       VALUES ('$NAME', '$PRICE', '$IMAGE_UP', '$CATEGORY_ID', '$USER_ID')";
            $RESULT = mysqli_query($con, $INSERT);

            if ($RESULT) {
                echo '<script>alert("Product uploaded successfully")</script>';
                header('refresh:1; url= products.php');
                exit();
            } else {
                echo '<script>alert("Database insertion failed: ' . mysqli_error($con) . '")</script>';
                header('refresh:1; url= upload.php');
                exit();
            }
        } else {
            echo '<script>alert("Failed to upload image")</script>';
            header('refresh:1; url= upload.php');
            exit();
        }
    }
}
?>
