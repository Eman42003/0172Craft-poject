<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Feedback</title>
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
        <h1>Feedback</h1>
        <p>We value your feedback! Please let us know what you think.</p>
        <form action="feedback.php" method="POST">
            <label for="feedback">Your Feedback:</label><br>
            <textarea name="feedback" id="feedback" rows="4" required></textarea><br><br>
            <input type="submit" value="Submit Feedback">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $feedback = $_POST['feedback'];
        // هنا يمكنك تخزين الملاحظات في قاعدة بيانات أو إرسالها عبر البريد الإلكتروني
        echo "<p>Thank you for your feedback!</p>";
    }
    ?>

</body>
</html>
