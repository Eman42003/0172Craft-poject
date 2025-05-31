<?php
require_once('config.php'); // الاتصال بقاعدة البيانات

session_start(); // بدء الجلسة

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $type = $_POST['submit'];

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
    <title>Sign Up page</title>
    <link rel="stylesheet" href="sign.css">
    <script src="sign.js" defer></script>
</head>
<body>
    <div class="signUp-page">
        
        <div class="signUp-container">
            <form action="signUp.php" method="POST">


            <div class="profile-icon">
                <img src="icons/Generic avatar login.svg" alt="User" style="width: 100px; height: 100px;">
            </div>

                  <!-- Full Name -->
                    <div class="input-line">
                    <img src="icons/full name.svg" alt="Full Name" class="icon" width="20" height="20">
                    <input type="text" name="full_name" placeholder=" full name" class="editable-line" required>
             </div>

                <!-- Email -->
                <div class="input-line">
                <img src="icons/Email.svg." alt="email" width="20" height="20">
                    <input type="email" name="email" placeholder=" email" class="editable-line" required>
                </div>

                <!-- Password -->
                <div class="input-line">
                <img src="icons/key.svg" alt="password" width="20" height="20">
                    <input type="password" name="password" placeholder=" password" class="editable-line" required>
                </div>

                <!-- Confirm Password -->
                <div class="input-line">
                  <img src="icons/key.svg" alt="password" width="20" height="20">
                    <input type="password" name="confirm_password" placeholder="Confirm your password" class="editable-line" required>
               
               
                </div>

               
                <!-- Sign Up Button -->
                <button type="submit" name="submit" class="SignUp-btn">Sign Up</button>
            </form>

            <!-- Display success or error messages -->
            <p class="google">
                Or Sign up with <a href="http://www.google.com" target="_blank">Google</a>
            </p>
        </div>
    </div>
</body>
</html>


