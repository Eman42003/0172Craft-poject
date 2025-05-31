<?php
session_start();

// التحقق من تسجيل الدخول
if (!isset($_SESSION['EMAIL'])) {
    header('location:../index.php');
    exit();
}

// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// التحقق من وجود ID
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // تنفيذ الحذف
    $query = "DELETE FROM addcategary WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>alert("تم حذف القسم بنجاح"); window.location.href="adminpanel.php";</script>';
    } else {
        echo '<script>alert("حدث خطأ أثناء الحذف"); window.location.href="adminpanel.php";</script>';
    }
} else {
    // لو مفيش ID صحيح
    header("location: adminpanel.php");
    exit();
}
?>
