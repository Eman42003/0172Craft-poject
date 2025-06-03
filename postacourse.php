<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Post Course page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
        .main{
  width: 40%;
  box-shadow: 1px 1px 10px silver;
  margin-top: 35px;
  padding: 40px;
  border-radius: 50px 2px 50px 10px;
  background-color: #7B411D;
}
.main form h2{
  color: #dbd6cc;
  font-size: 50px;
}
.uploadInput{
  margin-bottom: 10px;
  width: 60%;
  padding: 10px;
  font-size: 15px;
  font-weight: bold;
  border-radius: 10px;
  background-color: #dbd6cc;
}
#btnDone{
  transition-duration: .8s;
  border-radius: 10px 10px;
  padding: 8px;
  width: 30%;
  font-weight: bold;
  font-size: 18px;
  background-color: #dbd6cc;
  margin-top: 20px;
  cursor: pointer;
}
#btnDone:hover{
  background-color: #b9ac92 ;
}
.uploadLabel{
  border-radius: 10px;
  padding: 8px;
  cursor: pointer;
  font-weight: bold;
  box-shadow: 1px 1px 1px 3px #dbd6cc;
  transition-duration: .8s;
}
.uploadLabel:hover{
  background-color: #b9ac92 ;
}
.uploadA{
  text-decoration: none;
  font-size: 20px;
  font-weight: bold;
  color: white;
  transition-duration: .8s;
  border-radius: 10px;
}
.uploadA:hover{
  background-color: #b9ac92 ;
}


.cons{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin-top: 20px;
}
.officeCardContainer{
  display: inline-block;
  padding: 10px;
  text-align: center;
}
.officeCard{
  width: 18rem;
  background-color: rgb(168, 101, 56) ;
  border-radius: 10px;
  overflow: hidden;
}
.officeCard:hover{
  transform: translateY(-10px);
  box-shadow: 0px 2px 10px black;
}
.officeCard img{
  width: 100%;
  height: 200px;
}
.officeCardConetnt{
  padding: 20px;
}
.officeCardConetnt h3{
  margin: 10px 0;
  color: #fff;
  text-align: center;
  font-size: 20px;
  font-weight: bold;
}
.officeCardConetnt p{
  color: #fff;
  line-height: 1.5;
  text-align: center;
  font-size: 20px;
  font-weight: bold;
}
.drop{
  margin-top: 25px;
  background-color: #dbd6cc;
  text-align: center;
}
.drop h1{
  color: #91410D;
  font-size: 50px;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: bold;
}
.drop select{
  background-color: #91410D;
  width: 40%;
  color: white;
}
#am{
  margin-right: 10px;
  margin-left: 10px;
}

.icon-box {
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #91410D;
  border: 1px solid #ddd;
  border-radius: 20px;
  padding: 10px;
  width: 230px; 
  position: absolute; 
  left: 20px; 
  top: 50px; 
  margin: 0; 
  z-index: 10; 
}  
.icon {
  width: 20px;
  height: 20px;
  margin-right: 250px; 
}
.text {
  font-size: 24px;
  color: #fff;
}
.categories-container {
  display: flex; 
  flex-wrap: wrap; 
  gap: 20px; 
  justify-content: start; 
  margin-top: 200px; 
}
.category-item {
  flex: 0 0 calc(100% / 6 - 20px); 
  box-sizing: border-box; 
  display: flex;
  flex-direction: column;
  align-items: center;
} 
.category-image {
  width: 100px;
  height: 100px;
  object-fit: cover;
} 
.category-box {
  background-color: #91410D;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px;
  text-align: center;
  color: #fff; 
  margin-top: 10px; 
  width: 10%; 
}
main {
    margin: 20px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    background-color: #fffbfb;
    color: #a94b00;
}

form label {
    display: block;
    margin: 10px 0;
    text-align: left;
}

input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

div label {
    display: inline-block;
    margin: 10px;
}

button {
    background-color:  #a94b00;
    color: white;
    border: none;
    padding: 15px 25px;
    border-radius: 20px;
    cursor: pointer;
    margin: 50px;
}

button:hover {
    background-color: #8a3d00;
}
    </style>
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

  <script src="postacourse.js" defer></script>
</head>
<body>
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
                    $categorie_query = "SELECT id, name FROM categorie";
                    $categorie_result = mysqli_query($con, $categorie_query);
                    while ($cat_row = mysqli_fetch_assoc($categorie_result)) {
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
         <?php if (isset($_SESSION['user_id'])): ?>
            <a href="profile.php"><i class="fa-solid fa-user" style="color: #a94b00;"></i></a>
        <?php else: ?>
            <a href="login.php"><i class="fa-solid fa-user" style="color: #a94b00;"></i></a>
        <?php endif; ?>
    </nav>
</header>

  <main>
    <h2>Post your Course</h2>
    <form action="postacourse.php" method="post" enctype="multipart/form-data">
      <label>Full Name <input type="text" name="fullName" required></label>
      <label>Course <input type="text" name="course" required></label>
      <label>Course Video <input type="file" name="video" accept="video/*" required></label>
      <label>Price <input type="text" name="price" placeholder="EGP" required></label>
      <label>Phone <input type="tel" name="phone" required></label>
      <label>Address <input type="text" name="address" required></label>
      
      <button type="button" onclick="cancelForm()">Cancel</button>
      <button type="submit" name="submit">Post Now</button>
    </form>
  </main>

             
  
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

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "graduation_project";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = htmlspecialchars(trim($_POST['fullName']));
    $course = htmlspecialchars(trim($_POST['course']));
    $price = htmlspecialchars(trim($_POST['price']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    
  
    $video_path = "";
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video_tmp = $_FILES['video']['tmp_name'];
        $video_name = basename($_FILES['video']['name']);
        $video_ext = strtolower(pathinfo($video_name, PATHINFO_EXTENSION));
        $allowed_ext = ['mp4', 'webm', 'ogg'];

        if (in_array($video_ext, $allowed_ext)) {
            $unique_name = uniqid() . "_" . $video_name;
            $video_path = "uploads/videos/" . $unique_name;

            if (!file_exists("uploads/videos")) {
                mkdir("uploads/videos", 0777, true);
            }

            move_uploaded_file($video_tmp, $video_path);
        } else {
            echo "صيغة الفيديو غير مدعومة.";
            exit;
        }
    }

    $sql = "INSERT INTO courses (full_name, course, price, phone, address, video_path)
            VALUES ('$full_name', '$course', '$price', '$phone', '$address', '$video_path')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('تم نشر الدورة بنجاح!'); window.location.href = 'course-page.php';</script>";
    } else {
        echo "خطأ في الحفظ: " . $conn->error;
    }
}
$conn->close();
?>
