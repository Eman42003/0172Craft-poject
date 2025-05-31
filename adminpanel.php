<?php
session_start();

// تفاصيل الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// حذف المنتج لو فيه delete_id
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM products WHERE id = $id";
    if ($conn->query($delete_sql)) {
        echo "<script>alert('تم حذف المنتج بنجاح'); window.location.href='adminpanel.php';</script>";
    } else {
        echo "<script>alert('حدث خطأ أثناء الحذف');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-page</title>
    <link rel="stylesheet" href="adminpanal.css">
</head>
<body>


<div class="sidebar-container">
    
    
    <div class="sidebar">
        <h1>Control-page</h1>
        <ul>
            <li><a href="index.php" target="_blank">Home-page</a></li>
            <li><a href="products.php" target="_blank">Product-page</a></li>
             <li><a href="admin orders.php" target="_blank">orders-page</a></li>
            <li><a href="logout-admin.php">logout</a></li>
        </ul>
    </div>

   
    <div class="content-sec">
        <h2>products</h2>
        <table>
            <tr>
                <th>name</th>
                <th>price</th>
                <th>image</th>
                <th>action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><img src="<?= $row['image'] ?>" width="80" /></td>
                <td>
                    <a class="delet" href="adminpanel.php?delete_id=<?= $row['id'] ?>" onclick="return confirm('هل أنت متأكد من حذف المنتج؟')">
                         delete
                    </a>
                </td>
            </tr>
            <?php
                endwhile;
            else:
            ?>
            <tr><td colspan="5">لا توجد منتجات</td></tr>
            <?php endif; ?>
        </table>
    </div>
</div>

</body>
</html>
