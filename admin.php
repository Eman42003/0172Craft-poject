<?php
session_start();

// تفاصيل الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root"; // اسم المستخدم لقاعدة البيانات
$password = "";
$dbname = "graduation_project"; // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #7B411D;
        }
        .container {
            width: 400px;
            margin: 80px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 10px 20px;
            background-color: #7B411D;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ADemail = isset($_POST['email']) ? trim($_POST['email']) : '';
            $ADpassword = isset($_POST['password']) ? trim($_POST['password']) : '';

            if (isset($_POST['add'])) {
                if (empty($ADemail) || empty($ADpassword)) {
                    echo '<script>alert("الرجاء إدخال البريد الإلكتروني وكلمة المرور.");</script>';
                } else {
                    // استخدام prepared statement لحماية قاعدة البيانات من SQL Injection
                    $stmt = $conn->prepare("SELECT password FROM admin WHERE EMAIL = ?");
                    $stmt->bind_param("s", $ADemail);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $stored_password = $row['password'];

                        // التحقق من كلمة المرور سواء كانت مشفرة أو غير مشفرة
                        if (password_verify($ADpassword, $stored_password) || $ADpassword === $stored_password) {
                            $_SESSION['EMAIL'] = $ADemail;
                            echo '<script>alert("مرحبا بك يا مدير! سيتم تحويلك إلى لوحة التحكم.");</script>';
                            header("REFRESH:2; URL=adminpanel.php");
                        } else {
                            echo '<script>alert("كلمة المرور غير صحيحة! سيتم تحويلك إلى صفحة المنتجات.");</script>';
                            header("REFRESH:2; URL=index.html");
                        }
                    } else {
                        echo '<script>alert("البريد الإلكتروني غير صحيح! يرجى المحاولة مرة أخرى.");</script>';
                    }

                    $stmt->close();
                }
            }
        }
        ?>

        <div class="container">
            <h1>Admin1 login</h1>
            <form action="admin.php" method="post">
                <label for="email">email</label>
                <input type="email" name="email" id="email" required>
                
                <label for="password">password</label>
                <input type="password" name="password" id="password" required>
                
                <br>
                <button type="submit" name="add">login</button>
            </form>
        </div>
    </main>
</body>
</html>
