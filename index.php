<?php
session_start();
include 'conf.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Home - HOME MADE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <!-- Bootstrap CSS & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #e0e0e0;
      margin: 0;
      padding-top: 70px; 
    }
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
             color: #a94b00;
            text-decoration: none;
            margin: 0 5px;
            font-size: 18px;
        }
    nav a:hover {
      color: #ccc;
      transform: scale(1.3) rotate(5deg);
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
   
    .container {
    position: relative;
    width: 100%;
    max-width: 1500px;
    display: flex;
    background-color: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(6px);
    border-radius: 20px;
    box-shadow: 0 0 30px rgba(255, 140, 0, 0.4);
    overflow: hidden;
    margin: 40px auto;
  }

  .text-content {
    flex: 1;
    padding: 60px;
    z-index: 2;
  }

  .text-content h1 {
    font-size: 42px;
    color: #a94b00;
    margin-bottom: 10px;
  }

  .text-content p {
    font-size: 18px;
    color: #000;
    line-height: 1.6;
  }

  .image-content {
    flex: 1;
    position: relative;
  }

  .image-content img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    mix-blend-mode: lighten;
    box-shadow: -10px 0 30px rgba(0, 0, 0, 0.7);
  }

  .overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: linear-gradient(to right, rgba(28, 28, 28, 0.8), transparent);
    z-index: 1;
  }

  
  @media (max-width: 768px) {
    .container {
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }
    .text-content {
      padding: 20px;
      text-align: center;
    }
    .text-content h1 {
      font-size: 32px;
    }
  }

  @media (max-width: 480px) {
    .text-content h1 {
      font-size: 24px;
    }
    .text-content p {
      font-size: 16px;
    }
  }
    .cards-row {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: center;
    }
    .card {
      background-color: #fffaf0;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(255, 180, 48, 0.3);
      width: 260px;
      overflow: hidden;
      transition: transform 0.3s ease;
      text-align: center;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }
    .card-content {
      padding: 15px;
      color: #281404;
    }
    .card-content h3 {
      margin: 10px 0;
      font-size: 20px;
    }
    .card-content a.button {
      display: inline-block;
      background-color: #a94b00;
      color: #fff;
      padding: 10px 20px;
      border-radius: 4px;
      text-decoration: none;
      transition: background-color 0.3s ease;
      font-weight: 600;
    }
    .card-content a.button:hover {
      background-color: #8a3d00;
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


<div class="container">
  <div class="text-content">
    <h1>Discover the Magic of Handmade Crafts: Unique Art Pieces Made with Love!</h1>
    <p>
      Discover the world of authentic handmade crafts with us! A platform that connects creative artisans with customers seeking unique pieces full of creativity and quality. Let us be the bridge that supports local artisans and promotes sustainable trade, all while ensuring an exceptional shopping experience for products made with love and passion.
    </p>
  </div>
  <div class="image-content">
    <div class="overlay"></div>
    <img src="Photos/photo2.jpg" alt="Craft Image" />
  </div>
</div>
<<?php

$host = "localhost";      
$username = "root";       
$password = "";          
$database = "graduation_project";   

$con = mysqli_connect($host, $username, $password, $database);


if (!$con) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}


mysqli_set_charset($con, "utf8");
?>


<div class="cards-row">
  <?php
    $categories_query = "SELECT * FROM categories";
    $categories_result = mysqli_query($con, $categories_query);
    while ($cat_row = mysqli_fetch_assoc($categories_result)) {
  ?>
    <div class="card">
      <img src="Photos/<?= htmlspecialchars($cat_row['image']) ?>" alt="<?= htmlspecialchars($cat_row['name']) ?>" />

      <div class="card-content">
        <h3><?= htmlspecialchars($cat_row['name']) ?></h3>
        <a class="button" href="allproduct.php?category_id=<?= htmlspecialchars($cat_row['id']) ?>">View Details</a>
      </div>
    </div>
  <?php } ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
