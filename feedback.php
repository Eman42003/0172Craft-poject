<?php
// feedback.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "graduation_project");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $rating = (int)$_POST["rating"];
    $message = htmlspecialchars($_POST["message"]);

    $sql = "INSERT INTO feedback (name, email, rating, message)
            VALUES ('$name', '$email', $rating, '$message')";

    if ($conn->query($sql) === TRUE) {
        $success = "Feedback submitted successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }

    $conn->close();
}
session_start();
include 'conf.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Feedback Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
           font-family: 'Poppins', sans-serif;
            direction: ltr;
            background: #e0e0e0;
            padding-top: 70px;
            margin: 0;
        }
        header {
            background-color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(235, 233, 229, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            border-bottom: 1px solid #ccc;
            border-radius: 0 0 8px 8px;
            height: 60px;
             box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .logo-icon {
            font-size: 36px;
           /* font-weight: bold;*/
            color: #a94b00;
            /*margin-right: 8px;*/
            text-shadow: 0 0 10px #f77307;
        }
        .logo-text h1 {
            margin: 0;
            font-size: 22px;
            color: #cf630a;
        }
        .logo-text p {
            margin: 0;
            font-size: 12px;
            color: #cccccc;
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
            /*gap: 20px;
            flex-direction: row-reverse;*/
        }
        nav a {
            font-size: 18px;
            color: #a94b00;
            margin: 0 5px;
            text-decoration: none;
        }
        nav a:hover {
           transform: scale(1.3) rotate(5deg);
            color: #ccc;
        }
         
        /* Dropdown Menu Styles */
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
        
        .feedback-form {
            background-color: #fffbfb;
            padding: 25px;
            max-width: 500px;
            margin: 100px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            color: #a94b00;
            text-align: left;
        }
        .feedback-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .feedback-form input,
        .feedback-form select,
        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #a94b00;
        }
        .feedback-form button {
            background-color: #a94b00;
            color: white;
            padding: 12px;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
        }
        .message {
            text-align: center;
            margin-top: 15px;
            color: green;
        }
        .error {
            color: red;
        }
        /* Footer */
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
        <div class="logo-icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
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
    <nav class="d-flex align-items-center gap-4">
        
        
           <!-- Home -->
        <a href="index.php" class="fa-solid fa-house"></a>
 &nbsp;|&nbsp;&nbsp;&nbsp;
        <!-- Cart -->
        <a href="cart.php" class="fa-solid fa-cart-shopping"></a>
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
    <a href="boot.html" class="fa-solid fa-robot"></a>
      &nbsp;|&nbsp;&nbsp;&nbsp;
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="profile.php"><i class="fa-solid fa-user" style="color: #a94b00;"></i></a>
        <?php else: ?>
            <a href="login.php"><i class="fa-solid fa-user" style="color: #a94b00;"></i></a>
        <?php endif; ?>
 
    </nav>
</header>

<div class="feedback-form">
    <h2>Send Us Your Feedback</h2>
    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Rating</label>
        <select name="rating" required>
            <option value="5">5 - Excellent</option>
            <option value="4">4 - Very Good</option>
            <option value="3">3 - Good</option>
            <option value="2">2 - Fair</option>
            <option value="1">1 - Poor</option>
        </select>
        <label>Message</label>
        <input name="message" rows="4" required>
        <button type="submit">Submit</button>
    </form>
    <?php if (isset($success)) echo "<div class='message'>$success</div>"; ?>
    <?php if (isset($error)) echo "<div class='message error'>$error</div>"; ?>
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
