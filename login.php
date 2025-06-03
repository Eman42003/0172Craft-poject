<?php

$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "graduation_project";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    if (!isset($_POST['terms'])) {
        $error_message = "يجب الموافقة على الشروط والأحكام للمتابعة.";
    } else {
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
        $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;

        if (!empty($email) && !empty($password)) {
            
            $sql = "SELECT * FROM ills WHERE Email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
               
                if (password_verify($password, $row['PasswordHash'])) {
                    // Login successful
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_name'] = $row['FullName'];
                    $_SESSION['email'] = $row['Email'];
                    header("Location: index.php"); // Redirect to home page
                    exit();
                } else {
                    $error_message = "كلمة المرور غير صحيحة.";
                }
            } else {
                $error_message = "البريد الإلكتروني غير مسجل.";
            }
            $stmt->close();
        } else {
            $error_message = "الرجاء تعبئة جميع الحقول.";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Log In - HOME MADE</title>
  <link rel="stylesheet" href="LogIn.css">
  <script src="login.js"></script>
</head>
<body>
  <div class="login-container">
    <h2>Log In</h2>
    <form action="login.php" method="POST">
      <?php if (isset($error_message)): ?>
          <p class="error" style="color:red;"><?php echo $error_message; ?></p>
      <?php endif; ?>

      <label for="email">Email</label>
      <input type="email" name="email"  id="email" placeholder="Enter your email" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Enter your password" required>

      <div class="checkbox-group">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">I agree to the terms & conditions</label>
      </div>

      <div class="links">
        <a href="#">Forgot Password?</a>
        <a href="SignUp.php">Create Account</a>
      </div>

      <button type="submit" name="submit">Login</button>

      <div class="divider-wrapper">
        <span class="divider">OR</span>
      </div>

      <div class="social-section">
        <button class="social-btn">
          <span class="social-logo-wrapper">
            <img class="social-logo" src="https://auth.openai.com/assets/google-logo-NePEveMl.svg" alt="Google">
          </span>
          <span class="social-text">Continue with Google</span>
        </button>

        <button class="social-btn">
          <span class="social-logo-wrapper">
            <img class="social-logo" src="https://auth.openai.com/assets/microsoft-logo-BUXxQnXH.svg" alt="Microsoft">
          </span>
          <span class="social-text">Continue with Microsoft</span>
        </button>

        <button class="social-btn">
          <span class="social-logo-wrapper">
            <img class="social-logo" src="https://auth.openai.com/assets/apple-logo-vertical-full-bleed-tAoxPOUx.svg" alt="Apple">
          </span>
          <span class="social-text">Continue with Apple</span>
        </button>
      </div>
    </form>
  </div>
</body>
</html>
