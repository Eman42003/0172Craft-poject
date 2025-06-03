<?php

session_start();


if (!isset($_SESSION['user_id'])) {
    die("الرجاء تسجيل الدخول أولاً.");
}
$user_id = $_SESSION['user_id'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}


$full_name = $email = $phone = $address = $about_you = "";
$message = "";


$sql = "SELECT full_name, email, phone, address, about_you FROM profile WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $full_name = $row['full_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $about_you = $row['about_you'];
}
$stmt->close();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $about_you = trim($_POST['aboutyou']);

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "البريد الإلكتروني غير صالح.";
    } else {
      
        $full_name = htmlspecialchars($full_name);
        $email = htmlspecialchars($email);
        $phone = htmlspecialchars($phone);
        $address = htmlspecialchars($address);
        $about_you = htmlspecialchars($about_you);

        // إدخال أو تحديث البيانات باستخدام ON DUPLICATE KEY UPDATE
        $sql = "INSERT INTO profile (user_id, full_name, email, phone, address, about_you) 
                VALUES (?, ?, ?, ?, ?, ?)
                ON DUPLICATE KEY UPDATE 
                    full_name=VALUES(full_name), 
                    email=VALUES(email), 
                    phone=VALUES(phone), 
                    address=VALUES(address), 
                    about_you=VALUES(about_you)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssss", $user_id, $full_name, $email, $phone, $address, $about_you);

        if ($stmt->execute()) {
            $message = "تم حفظ بياناتك بنجاح!";
        } else {
            $message = "خطأ في الحفظ: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>profile-page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
      <style>
        header {
            background-color: white;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
        }
        .logo-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .logo-icon {
      font-size: 36px;
      color: #a94b00;
      text-shadow: 0 0 10px #f77307;
    }
    .logo-text h1 {
      font-size: 22px;
      color: #cf630a;
      margin: 0;
    }
    .logo-text p {
      font-size: 12px;
      color: #cccccc;
      margin: 0;
      letter-spacing: 1px;
    }
         .search-container {
            flex-grow: 1;
            max-width: 500px;
            margin: 0 20px;
        }
        .search-bar {
            position: relative;
            width: 100%;
        }
        .search-bar input {
            width: 100%;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-family: 'Poppins', sans-serif;
        }
        nav {
            display: flex;
            align-items: center;
        }
        nav a {
            color: #333;
            text-decoration: none;
            margin: 0 5px;
            font-size: 18px;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: #e0e0e0;
            margin: 0;
            padding-top: 80px;
        }

        
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .cart-table th {
            background-color: #a94b00;
            color: white;
            font-weight: 600;
        }
        .cart-table img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        .cart-total {
            margin-top: 20px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-success {
            background-color: #a94b00;
        }
        .btn-success:hover {
            background-color: #8a3d00;
        }
        .btn-danger {
            background-color: #734d26;
        }
        .btn-danger:hover {
            background-color: #c0392b;
        }
        .alert-info {
            margin: 50px auto;
            padding: 20px;
            background-color: #d9edf7;
            color: #31708f;
            border-radius: 10px;
            max-width: 600px;
            text-align: center;
        }

        
        #listMenu {
            display: none;
            position: absolute;
            top: 90px;
            right: 60px;
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            z-index: 1000;
        }
        #listMenu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            columns: 2;
            column-gap: 30px;
        }
        #listMenu li {
            padding: 8px 0;
            color: #333;
            cursor: pointer;
        }
        #listMenu li:hover {
            color: #a94b00;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 15px;
            }
            .logo-container, .search-container {
                width: 100%;
                margin-bottom: 15px;
            }
            #listMenu {
                right: 20px;
                width: 80%;
            }
            #listMenu ul {
                columns: 1;
            }
        }
        .form-container {
    max-width: 1000px; 
    margin: 40px auto;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    background-color: #fffbfb;
    color: #a94b00;
}

.form-container h1 {
    text-align: center;
    color: #a94b00;
    margin-bottom: 20px;
}

.form-container .profile-icon {
   
    margin: 0 auto 20px;
    width: 100px;
    height: 100px;
    background-color: #a94b00;
    border-radius: 50%;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.form-group input, .form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

.form-group textarea {
    height: 80px;
    resize: none;
}

.form-actions {
    display: flex;
    justify-content: space-between;
}

.form-actions button {
    background-color: #a94b00;
    color: #fff;
    border: none;
    padding: 10px 25px;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-right: 10px; 
}

.form-actions button:hover {
    background-color: #56391c;
}
.input-line {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    margin-bottom: 20px;
    border-bottom: 1px solid #ccc;
    padding: 5px;
    font-family: 'Times New Roman', Times, serif;
}




.input-line .icon {
    width: 10px;
    height: 10px;
    margin-right: 10px;
}

.editable-line {
    flex: 1;
    padding: 8px 10px;
    border: none;
    outline: none;
    font-size: 14px;
}

.editable-line:empty::before {
    content: attr(data-placeholder); 
    color: #8b471a;
    font-style: normal;
    font-size: large;
    font-weight: bold;
}
.profile-container {
    width: 50%;
    max-width: 600px;
    margin: 90px auto;
    
    padding: 80px;
    border-radius: 10px;
    box-shadow: 0 10px 10px rgb(228, 182, 137); 
    text-align: center; 
    height: 20;
    outline:1px solid #4e342e;
    background-color: #fffbfb;
    color: #a94b00;
}

   footer {
      background-color: #f0f0f0;
      padding: 40px 20px;
      color: #4e342e;
      font-size: 14px;
    }
    .footer-container {
      max-width: 1200px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .footer-column {
      flex: 1 1 220px;
      margin: 10px;
    }
    .footer-column h4 {
      font-weight: bold;
      margin-bottom: 10px;
      color: #a94b00;
    }
    .footer-column a {
      display: block;
      margin: 5px 0;
      color: #4e342e;
      text-decoration: underline;
    }
    
    .footer-column a:hover {
      color: #a94b00;
    }
    .social-icons span {
      margin-right: 10px;
      background-color: #ccc;
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
    }
    .footer-bottom {
      text-align: center;
      margin-top: 30px;
      border-top: 1px solid #ccc;
      padding-top: 20px;
      color: #827d7d;
    }

    @media (max-width: 768px) {
      .cards-row {
        justify-content: center;
      }
      .search-container {
        max-width: 100%;
        margin: 0 10px;
      }
    }

    @media (max-width: 480px) {
      nav a {
        font-size: 16px;
        margin-left: 10px;
      }
     
    }

    </style>
    <script src="profile.js" defer></script>
</head>
<body>
    </head>
<body>
    <script>
      function toggleListMenu() {
            const menu = document.getElementById('listMenu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }

        document.addEventListener('click', function(event) {
            const menu = document.getElementById('listMenu');
            const menuButton = document.querySelector('.fa-list').parentElement;

            if (!menu.contains(event.target) && event.target !== menuButton && !menuButton.contains(event.target)) {
                menu.style.display = 'none';
            }
        });
</script>
    <header>
    <div class="logo-container">
        <div class="logo-icon"><i class="fa-solid fa-hand-holding-heart" style="color: #a94b00;"></i></div>
        <div class="logo-text">
            <h1>HOME MADE</h1>
            <p>With our love</p>
        </div>
    </div>
     <div class="search-container">
  <form action="search.php" method="GET">
    <div class="search-bar">
      <input type="text" name="search" placeholder="Search products..." required />
      <button type="submit" style="display:none;">Search</button>
    </div>
  </form>
</div>
    <nav>
        <a href="index.php"><i class="fa-solid fa-house" style="color: #a94b00;"></i></a>
        &nbsp;|&nbsp;&nbsp;&nbsp;
        <a href="cart.php"><i class="fa-solid fa-cart-shopping" style="color: #a94b00;"></i></a>
        &nbsp;|&nbsp;&nbsp;&nbsp;
        <a href="#"><i class="fa-solid fa-list" style="color: #a94b00;" onclick="toggleListMenu()"></i></a>

        <div id="listMenu">
            <ul>
                <li><a href="course-page.php" style="color: inherit; text-decoration: none;">Courses</a></li>
                <?php
                $host = "localhost";
                $user = "root";
                $password = "";
                $dbname = "graduation_project";
                $con = mysqli_connect($host, $user, $password, $dbname);
                if ($con) {
                    $categories_query = "SELECT id, name FROM categories";
                    $categories_result = mysqli_query($con, $categories_query);
                    while ($cat_row = mysqli_fetch_assoc($categories_result)) {
                        echo '<li><a href="allproduct.php?category_id='.$cat_row['id'].'" style="color: inherit; text-decoration: none;">'.htmlspecialchars($cat_row['name']).'</a></li>';
                    }
                    mysqli_close($con);
                }
                ?>
            </ul>
        </div>

        &nbsp;|&nbsp;&nbsp;&nbsp;
        <a href="feedback.php"><i class="fa-solid fa-message" style="color: #a94b00;"></i></a>
        &nbsp;|&nbsp;&nbsp;&nbsp;
        <a href="boot.html"><i class="fa-solid fa-robot" style="color: #a94b00;"></i></a>
        &nbsp;|&nbsp;&nbsp;&nbsp;
         <div>
      <?php if (isset($_SESSION['user_name'])): ?>
  <a href="profile.php" style="color:#a94b00; font-weight:600; margin-right:15px; text-decoration:none;">
    Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>
  </a>
  <a href="logout.php" style="color:#a94b00; text-decoration:none;">
    <i class="fa-solid fa-right-from-bracket"></i> Logout
  </a>
<?php else: ?>
  <a href="login.php"><i class="fa-solid fa-user" style="color: #a94b00;"></i></a>
<?php endif; ?>

    </div>
    </nav>
</header>

        <div class="profile-container">
            <h1>profile</h1>

            <?php if (!empty($message)) : ?>
                <div style="color: <?php echo (str_contains($message, 'خطأ')) ? 'red' : 'green'; ?>; font-weight: bold; margin-bottom: 15px;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="profile.php" method="post">
                <img src="icons/Generic avatar login.svg" alt="user" width="90" height="90" />

                
                <div class="input-line">
                    <img src="icons/full name.svg" alt="name" width="20" height="20" />
                    <input type="text" name="full_name" placeholder="full name" class="editable-line" required value="<?php echo htmlspecialchars($full_name); ?>" />
                </div>

                
                <div class="input-line">
                    <img src="icons/Email.svg" alt="email" width="20" height="20" />
                    <input type="email" name="email" placeholder="email" class="editable-line" required value="<?php echo htmlspecialchars($email); ?>" />
                </div>

                
                <div class="input-line">
                    <img src="icons/phone.svg" alt="phone" width="20" height="20" />
                    <input type="tel" name="phone" placeholder="phone" class="editable-line" required value="<?php echo htmlspecialchars($phone); ?>" />
                </div>

               
                <div class="input-line">
                    <img src="icons/location_on.svg" alt="address" width="20" height="20" />
                    <input type="text" name="address" placeholder="address" class="editable-line" required value="<?php echo htmlspecialchars($address); ?>" />
                </div>

                <div class="form-group">
                    <input type="text" name="aboutyou" placeholder="About you" value="<?php echo htmlspecialchars($about_you); ?>" />
                </div>

                <div class="form-actions">
                    <a href="upload.php">
                        <button type="button">Post a product</button>
                    </a>
                    <a href="postacourse.php">
                        <button type="button">Post a course</button>
                    </a>
                    <button type="submit" name="submit">Save</button>
                </div>
            </form>
        </div>

<footer>
  <div class="footer-container">
    <div class="footer-column">
      <h4>Buying & Selling</h4>
      <a href="#">Financing</a>
      <a href="#">Find a Product</a>
      <a href="#">Offers by Region</a>
      <a href="#">Sell Your Products</a>
    </div>
    <div class="footer-column">
      <h4>Explore Our Brand</h4>
      <a href="#">homemade.com</a>
      <h4>Dealer Partners</h4>
      <a href="login.php">Platform Log-In</a>
    </div>
    <div class="footer-column">
      <h4>Company Info</h4>
      <a href="index.php">About Us</a>
      <a href="#">Contact</a>
      <a href="#">Licensing</a>
      <a href="Feedback.php">Feedback</a>
    </div>
    <div class="footer-column">
      <h4>Contact Us</h4>
      <p>01091398406</p>
      <h4>Follow Us</h4>
      <div class="social-icons">
        <span>Facebook</span>
        <span>Instagram</span>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>©2024 HOME MADE. All rights reserved. Designed by Craft Team</p>
  </div>
</footer>

    
</body>
</html>
