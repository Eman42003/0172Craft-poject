<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";

$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// تعريف متغيرات
$full_name = $email = $phone = $address = $about_you = "";
$message = "";

// عند إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $about_you = trim($_POST['aboutyou']);

    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "البريد الإلكتروني غير صالح.";
    } else {
        // منع الأكواد الخبيثة
        $full_name = htmlspecialchars($full_name);
        $email = htmlspecialchars($email);
        $phone = htmlspecialchars($phone);
        $address = htmlspecialchars($address);
        $about_you = htmlspecialchars($about_you);

        // إدخال البيانات
        $sql = "INSERT INTO profile (full_name, email, phone, address, about_you) 
                VALUES ('$full_name', '$email', '$phone', '$address', '$about_you')";

        if ($conn->query($sql) === TRUE) {
            $message = "تم حفظ بياناتك بنجاح!";
        } else {
            $message = "خطأ في الحفظ: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile-page</title>
    <link rel="stylesheet" href="profile.css">
    <script src="profile.js" defer></script>
</head>
<body>
    <div class="profile-page">
        <header class="header">
            <!-- ممكن تضيف هنا Navigation -->
        </header>

        <div class="profile-container">
            <h1>profile</h1>

            <?php if (!empty($message)): ?>
                <div style="color: <?php echo (str_contains($message, 'خطأ')) ? 'red' : 'green'; ?>; font-weight: bold; margin-bottom: 15px;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="profile.php" method="post">
                <img src="icons/Generic avatar login.svg" alt="user" width="90" height="90">

                <!-- Full Name -->
                <div class="input-line">
                    <img src="icons/full name.svg" alt="name" width="20" height="20">
                    <input type="text" name="full_name" placeholder="full name" class="editable-line" value="<?php echo $full_name; ?>" required>
                </div>

                <!-- Email -->
                <div class="input-line">
                    <img src="icons/Email.svg." alt="email" width="20" height="20">
                    <input type="email" name="email" placeholder="email" class="editable-line" value="<?php echo $email; ?>" required>
                </div>

                <!-- Phone -->
                <div class="input-line">
                    <img src="icons/phone.svg" alt="phone" width="20" height="20">
                    <input type="text" name="phone" placeholder="phone" class="editable-line" value="<?php echo $phone; ?>" required>
                </div>

                <!-- Address -->
                <div class="input-line">
                    <img src="icons/location_on.svg" alt="location" width="20" height="20">
                    <input type="text" name="address" placeholder="address" class="editable-line" value="<?php echo $address; ?>" required>
                </div>

                <!-- About You -->
                <div class="form-group">
                    <input type="text" name="aboutyou" placeholder="About you" value="<?php echo $about_you; ?>">
                </div>

                <div class="form-actions">
                    <a href="upload.php">
                        <button type="button">Post product</button>
                    </a>
                    <a href="postacourse.php">
                        <button type="button">Post  course</button>
                    </a>
                    <button type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
