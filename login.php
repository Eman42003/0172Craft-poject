<?php


// Database connection details
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = "";
$dbname = "graduation_project"; // اسم قاعدة البيانات

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Initialize session
session_start();

// Check request method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;

    if (!empty($email) && !empty($password)) {
        // Find user by email
        $sql = "SELECT * FROM ills WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $row['PasswordHash'])) {
                // Login successful
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['FullName'];
                $_SESSION['email'] = $row['Email'];
                header("Location: index.php"); // Redirect to home page
                exit();
            } else {
                $error_message = "Incorrect password.";
            }
        } else {
            $error_message = "Email not registered.";
        }
        $stmt->close();
    } else {
        $error_message = "Please fill in all fields.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="styles.css">
    <script src="login.js" defer></script>
</head>
<body>
    <div class="login-page">
        <header class="header">
            <h1 class="logo">Home Made</h1>
        </header>
        
        <div class="login-container">
            <form action="login.php" method="POST">
                <h2>Log In</h2>

                <!-- Display error message -->
                <?php if (isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

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

                <!-- Remember Me and Forgot Password -->
                <div class="options">
                    <label><input type="checkbox" name="remember_me"> Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <!-- Log In Button -->
                <button type="submit" class="login-btn">Log In</button>

                <!-- Create Account -->
                <p>
                    Don't have an account? <a href="signUp.php">Sign Up</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
