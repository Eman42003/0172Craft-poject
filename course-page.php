<?php

$conn = new mysqli("localhost", "root", "", "graduation_project");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM courses ORDER BY id DESC";
$result = $conn->query($sql);
?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>course-page</title>
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
        nav {
    margin-top: 20px; 
    display: flex; 
    align-items: center;
}

nav a {
    margin-right: 15px;
    color: #a94b00;
    text-decoration: none;
    font-size: 18px;
}

nav a:hover {
    color: #ec801c;
}

nav .dropdown {
    margin-left: 15px; 
}

nav .dropdown a {
    margin-right: 0; 
}


.grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* أقل عرض للكارت 280px وياخد 1fr من المساحة المتاحة */
    gap: 20px;
    padding: 20px;
    margin-top: 140px; 
}


.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    overflow: hidden;
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
}

.card-content h3 {
    font-size: 18px;
    color: #a94b00;
    margin-bottom: 10px;
}

.card-content p {
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
    text-align: right;
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

<div class="grid-container" style="margin-top: 80px;">
    <?php
    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
    echo '<div class="card">';

   
    if (!empty($row["video_path"]) && file_exists($row["video_path"])) {
        echo '<video controls width="100%" height="200" style="border-radius: 8px;">
                <source src="' . htmlspecialchars($row["video_path"]) . '" type="video/mp4">
                المتصفح لا يدعم عرض الفيديو.
              </video>';
    } else {
       
        echo '<img src="icons/user course.png" alt="user" style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">';
    }

    echo '
        <div class="card-content">
            <h3>' . htmlspecialchars($row["full_name"]) . '</h3>
            <p>' . htmlspecialchars($row["course"]) . '</p>
            <p>' . htmlspecialchars($row["price"]) . '</p>
            <p>' . htmlspecialchars($row["phone"]) . '</p>
            <p>' . htmlspecialchars($row["address"]) . '</p>
        </div>
    </div>';
}

    } else {
        echo "<p style='margin: 20px;'>لا توجد كورسات مضافة حتى الآن.</p>";
    }

    $conn->close();
    ?>
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
