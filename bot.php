<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BoT</title>
</head>
<body>

    <!-- شريط التنقل -->
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="cart.php">Shopping Cart</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="bot.php">BoT</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>

    <!-- المحتوى الرئيسي للصفحة -->
    <div class="content">
        <h1>Welcome to the BoT (Chatbot)</h1>
        <p>Start chatting with our bot!</p>
        <form action="bot.php" method="POST">
            <label for="message">Your Message:</label><br>
            <textarea name="message" id="message" rows="4" required></textarea><br><br>
            <input type="submit" value="Send Message">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $message = $_POST['message'];
            // يمكن إضافة منطق معالج للرسائل هنا
            echo "<p>Bot's reply: I'm here to help!</p>";
        }
        ?>
    </div>

</body>
</html>
