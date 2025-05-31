<?php
include('conf.php');

if (isset($_POST['update'])) {
    $ID = $_POST['id'];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $CATEGORY_ID = $_POST['category_id'];


    $car_query = mysqli_query($con, "SELECT * FROM products WHERE id='$ID'");
    $car_data = mysqli_fetch_assoc($car_query);

    $IMAGE_UP = $car_data['image'];


    if (!empty($_FILES['image']['name'])) {
        $IMAGE_LOCATION = $_FILES['image']['tmp_name'];
        $IMAGE_NAME = $_FILES['image']['name'];
        $IMAGE_UP = "images/" . basename($IMAGE_NAME);
        
        if (move_uploaded_file($IMAGE_LOCATION, $IMAGE_UP)) {

        } else {
            echo "<script>alert('Error In Photo Upload')</script>";

            $IMAGE_UP = $car_data['image'];
        }
    }


    if (empty($PRICE)) {
        $PRICE = $car_data['price'];
    }


    if (empty($CATEGORY_ID)) {
        $CATEGORY_ID = $car_data['category_id'];
    }


    $UPDATE = "UPDATE products SET name='$NAME', price='$PRICE', image='$IMAGE_UP', category_id='$CATEGORY_ID' WHERE id='$ID'";
    
    if (mysqli_query($con, $UPDATE)) {
        echo "<script>alert('Update Done')</script>";
    } else {
        echo "<script>alert('Error In Update: " . mysqli_error($con) . "')</script>";
    }
    

    header('location: products.php'); 
    exit();
}
?>