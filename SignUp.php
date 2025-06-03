<?php
require_once('config.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $type = $_POST['submit'];

    
    if ($password != $confirm_password) {
        echo "كلمات المرور غير متطابقة!";
        exit();
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO ills (FullName, Email, PasswordHash, Type) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $email, $hashed_password, $type);

    if ($stmt->execute()) {
        echo "تم التسجيل بنجاح!";
        header("Location: login.php"); 
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
  <title>Sign Up - HOME MADE</title>
  <link rel="stylesheet" href="SignUp.css">
  <script src="sign.js"></script>

</head>
<body>

  
  <div class="register-container">
    <h2>Sign Up</h2>
    <form action="signUp.php" method="post">
      <label for="name">Full Name</label>
      <input type="text" name="full_name" id="name" placeholder="Enter your full name" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Enter your email" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Enter your password" required>

      <label for="confirm-password">Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm your password" required>

      <div class="checkbox-group">
        <input type="checkbox" id="terms" required>
        <label for="terms">I agree to the terms & conditions</label>
      </div>

      <button type="submit" name="submit">Sign Up</button>

      <div class="divider-wrapper">

        
        <span class="divider">OR</span>
      

      </div>

      <div class="social-section">
        <button class="social-btn " aria-disabled="false" aria-describedby=":r6:">
          <span class="social-text">Continue with Google</span>
          <span class="social-logo-wrapper">
            <img class="social-logo" src="https://auth.openai.com/assets/google-logo-NePEveMl.svg" alt="Google logo">
          </span>
        </button>
        <button class="social-btn " aria-disabled="false" aria-describedby=":r7:">
          <span class="social-logo-wrapper">
            <img class="social-logo" src="https://auth.openai.com/assets/microsoft-logo-BUXxQnXH.svg" alt="Microsoft logo">
          </span>
          <span class="social-text">Continue with Microsoft Account</span>
        </button>
        <button class="social-btn " aria-disabled="false" aria-describedby=":r8:">
          <span class="social-logo-wrapper">
            <img class="social-logo" src="https://auth.openai.com/assets/apple-logo-vertical-full-bleed-tAoxPOUx.svg" alt="Apple logo">
          </span>
          <span class="social-text">Continue with Apple</span>
        </button>
      </div>


    </form>
  </div>
</body>
</html>
