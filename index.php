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

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Made</title>
    <link rel="stylesheet" href="home-3.css"> <!-- ربط ملف CSS -->
    <script src="home-3.js" defer></script>
</head>
<body>
    <div class="Home Made-page">
        <!-- شريط العنوان -->
        <header class="header">
            <h1 class="logo">HOME MADE</h1>
            <div class="search-bar">
                <img src="icons/search icon.svg" alt="search icon">
                <input type="text" placeholder="Hinted search text" required>
            </div>
            <div class="images-bar">
                <a href="index.html">
                    <img src="icons/Home.svg" alt="home" width="20" height="20">
                </a>
                <img src="icons/Shopping cart.svg" alt="Shopping" width="20" height="20">
                <img src="icons/list.svg" alt="list" width="20" height="20">
                <img src="icons/Feedback.svg" alt="Feedback" width="20" height="20">
                <img src="icons/BOT.svg" alt="BOT" width="20" height="20">
                <a href="login.php"> <!-- رابط صفحة تسجيل الدخول -->
                    <img src="icons/User.svg" alt="user" width="20" height="20">
                </a>
            </div>
        </header>
        
        <main>
            <section class="banner">
                <img src="photos/banner.png" alt="banner" width="1530" height="400">
            </section>
            <section class="category">
                <div class="category-list">
                    <div class="icon-box">
                        <img src="icons/category.svg" alt="category">
                        <span class="text">Category</span>
                    </div>
                </div>
                <div class="categories-container">
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
                </div>
            </section>
        </main>
        
        <footer>
            <div class="main-container">
                <!-- Footer Top Start -->
                <div class="footer-top">
                    <div class="col">
                        <div class="head-title">
                            <h2>Basic Links</h2>
                        </div>
                        <div class="content">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>   
                        </div>
                    </div>
                    <div class="col">
                        <div class="head-title">
                            <h2>Social Media</h2>
                        </div>
                        <div class="content">
                            <div class="social-icons">
                                <a href="https://facebook.com" target="_blank">
                                    <img src="icons/Facebook.svg" alt="Facebook" class="icon">
                                </a>
                                <a href="https://instagram.com" target="_blank">
                                    <img src="icons/Instagram.svg" alt="Instagram" class="icon">
                                </a>
                                <a href="https://twitter.com" target="_blank">
                                    <img src="icons/Twitter.svg" alt="Twitter" class="icon">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="head-title">
                            <h2>Contact Information</h2>
                        </div>
                        <div class="content">
                            <div class="info-item">
                                <img src="icons/phone.svg" alt="Phone" class="icon">
                                <p>0000 0000 0000</p>
                            </div>
                            <div class="info-item">
                                <img src="icons/Email.svg" alt="Email" class="icon">
                                <a href="mailto:homemade123@gmail.com" class="link">homemade123@gmail.com</a>
                            </div>
                            <div class="info-item">
                                <img src="icons/location_on.svg" alt="Location" class="icon">
                                <p>We are located in Cairo, Fayoum</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Top End -->

                <!-- Footer Bottom Start -->
                <div class="footer-bottom">
                    <div class="payment-method">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-cc-amex"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-cc-amazon-pay"></i></a></li>
                        </ul>
                    </div>
                    <div class="copyright">
                        <p>Copyright ©2024 All rights reserved | This template is made with <i class="fa-solid fa-heart"></i> by <a href="#">Craft Team</a></p>
                    </div>
                </div>
                <!-- Footer Bottom End -->
            </div>
        </footer>
    </div>
</body>
</html>

<?php
// إغلاق الاتصال بقاعدة البيانات
$conn->close();
?>
