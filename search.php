<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "graduation_project";

$con = mysqli_connect($host, $user, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = trim($_GET['search']);

   
    $query = "SELECT id FROM categories WHERE name LIKE '%$search%' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $category_id = $row['id'];
        header("Location: allproduct.php?category_id=$category_id");
        exit();
    } else {
       
        echo "<h3 style='text-align:center; margin-top: 100px;'>لا يوجد تصنيف بهذا الاسم.</h3>";
    }
} else {
    echo "<h3 style='text-align:center; margin-top: 100px;'>لم يتم إدخال كلمة بحث.</h3>";
}
?>
