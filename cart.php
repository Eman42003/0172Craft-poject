<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shopping Cart</title>
      <style>
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

      
      
  @media (max-width: 768px) {
    .container {
      flex-direction: column;
      align-items: center;
    }
  
    .container-cards {
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    }
  
    .card-content h3 {
      font-size: 18px;
    }
  
    .card-content button {
      font-size: 14px;
    }
  }
  
  @media (max-width: 480px) {
    .text-content h1 {
      font-size: 24px;
    }
  
    .text-content p {
      font-size: 16px;
    }
  
    .container-cards {
      grid-template-columns: 1fr;
    }
  
    nav a {
      font-size: 16px;
    }
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
            font-size: 28px;
        }
        .logo-text h1 {
            margin: 0;
            font-size: 24px;
            color: #a94b00;
        }
        .logo-text p {
            margin: 0;
            font-size: 12px;
            color: #666;
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

        /* Table and buttons styling */
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
        .cart {
    text-align: center;
    margin: 20px 0;
}

.cart-status h1 {
    font-size: 2.2em;
    margin: 20px 0 10px;
    color: #555;
}

.cart-icon {
    width: 80px;
    margin-top: 10px;
}

/* Cart Table Styling */
.cart-table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    font-size: 1em;
}

.cart-table th,
.cart-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

.cart-table th {
    background-color: #f4ede4;
    color: #734d26;
    font-weight: bold;
}

.cart-table img {
    max-width: 60px;
    border-radius: 50%;
}
 .error {
            color: red;
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

  <script src="cart.js" defer></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />
  


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
         <?php if (isset($_SESSION['user_id'])): ?>
            <a href="profile.php"><i class="fa-solid fa-user" style="color: #a94b00;"></i></a>
        <?php else: ?>
            <a href="login.php"><i class="fa-solid fa-user" style="color: #a94b00;"></i></a>
        <?php endif; ?>
    </nav>
</header>
  <main>
    <section class="cart">
      <div class="cart-status">
        <h1>Your Home Made shopping cart.</h1>
        <img src="photos/cart2.png" alt="Empty Cart" class="cart-icon">
      </div>
    </section>

    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
      <table class="cart-table">
        <thead>
          <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $total = 0;
          foreach ($_SESSION['cart'] as $item): 
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
          ?>
          <tr>
            <td><img src="<?php echo $item['image']; ?>" alt="product"></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['price']; ?> EGP</td>
            <td><?php echo $item['quantity']; ?></td>
            <td><?php echo $subtotal; ?> EGP</td>
          </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" style="text-align:right;"><strong>total</strong></td>
            <td><strong><?php echo $total; ?> EGP</strong></td>
          </tr>
        </tfoot>
      </table>
      <div class="cart-total">
  <a href="checkout.php" class="btn" style="background-color: #a94b00; color: white;">checkout</a>
  <a href="clear-cart.php" class="btn" style="background-color: #a94b00; color: white;">empty cart</a>
</div>

    <?php else: ?>
      <div class="alert alert-info text-center">
        There are currently no products in the cart.
      </div>
    <?php endif; ?>

    
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
  </main>
</body>
</html>
