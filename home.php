<?php
session_start(); // بدء الجلسة

// التحقق إذا كان المستخدم قد سجل الدخول
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // إذا لم يكن قد سجل الدخول، يتم توجيهه إلى صفحة Login
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project"; // اسم قاعدة البيانات المستخدمة في المشروع

// الاتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استعلام لجلب الفئات من قاعدة البيانات
$sql = "SELECT * FROM categories"; 
$result = $conn->query($sql);
?>


                    <?php
                    // التحقق من وجود نتائج الفئات في قاعدة البيانات
                    if ($result->num_rows > 0) {
                        // عرض الفئات
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="category-item">';
                            echo '<img src="photos/' . $row["image"] . '" alt="' . $row["name"] . '" class="category-image">';
                            echo '<div class="category-box">' . $row["name"] . '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo "<p>لا توجد فئات لعرضها.</p>";
                    }
                    ?>
               

<?php
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
