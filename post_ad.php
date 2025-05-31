<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم الافتراضي في XAMPP
$password = ""; // كلمة المرور الافتراضية في XAMPP
$dbname = "graduation_project"; // تأكد من إنشاء قاعدة البيانات بهذا الاسم

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// التحقق من طلب POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $category = $_POST['category'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $agree = isset($_POST['agree']) ? 1 : 0;
    $submit = $_POST['submit'];

    // معالجة رفع الصور
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

    // تحويل الصور إلى نص
    $images = implode(",", $imagePaths);

    // إدخال البيانات إلى قاعدة البيانات
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
