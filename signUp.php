<?php
require_once('config.php'); // الاتصال بقاعدة البيانات

session_start(); // بدء الجلسة

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $type = $_POST['type'];

    // التحقق من تطابق كلمات المرور
    if ($password != $confirm_password) {
        echo "كلمات المرور غير متطابقة!";
        exit();
    }

    // تشفير كلمة المرور
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // استعلام الإدخال
    $sql = "INSERT INTO ills (FullName, Email, PasswordHash, Type) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $email, $hashed_password, $type);

    if ($stmt->execute()) {
        echo "تم التسجيل بنجاح!";
        header("Location: login.php"); // إعادة التوجيه لصفحة تسجيل الدخول
        exit();
    } else {
        echo "حدث خطأ أثناء التسجيل: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="sign.css">
    <script src="sign.js" defer></script>
</head>
<body>
    <div class="signUp-page">
        <header class="header">
            <h1 class="logo">Home Made</h1>
        </header>
        
        <div class="signUp-container">
            <form action="signUp.php" method="POST">
                <h2>Sign Up</h2>

                <!-- Full Name -->
                <div class="input-line">
                    <label>Full Name</label>
                    <input type="text" name="full_name" placeholder="Enter your full name" required>
                </div>

                <!-- Email -->
                <div class="input-line">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Password -->
                <div class="input-line">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>

                <!-- Confirm Password -->
                <div class="input-line">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Confirm your password" required>
                </div>

                <!-- Sign Up Button -->
                <button type="submit" class="SignUp-btn">Sign Up</button>
            </form>

            <!-- Display success or error messages -->
            <p class="google">
                Or Sign up with <a href="#"></a>
                
            </p>
        </div>
    </div>
</body>
</html>


