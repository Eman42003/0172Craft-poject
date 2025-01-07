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
    $type = $_POST['submit'];

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
                header("Location: index.html"); // Redirect to home page
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
        
        <div class="login-container">
            <form action="login.php" method="POST">
                <img src="icons/Generic avatar login.svg" alt="user" style="width: 100px; height: 100px;">

                <!-- Display error message -->
                <?php if (isset($error_message)): ?>
                    <p class="error"><?php echo $error_message; ?></p>
                <?php endif; ?>

                <!-- Email -->
                <div class="input-line">
                <img src="icons/Email.svg" alt="email" width="20" height="20">
                    <input type="email" name="email" placeholder=" email" class="editable-line" required>
                </div>
                
                <!-- Password -->
                <div class="input-line">
                <img src="icons/key.svg" alt="password" width="20" height="20">
                    <input type="password" name="password" placeholder="password" class="editable-line" required>
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="options">
                    <label><input type="checkbox" name="remember_me"> Remember Me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <!-- Log In Button -->
                <button type="submit" name="submit" class="login-btn">Log In</button>

                <!-- Create Account -->
                <p>
                    Don't have an account? <a href="signUp.php">Sign Up</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
