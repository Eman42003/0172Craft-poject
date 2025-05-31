<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Craft | Edit Product</title>
    <link rel="stylesheet" type="text/css" href="color.css">
</head>
<body>

    <div class="Home Made-page">
        <!--                                                         شريط العنوان                                                    -->
        <header class="header">
            <h1 class="logo">HOME MADE</h1>
            <form action="home.php" method="post" enctype="multipart/form-data">
                <div class="search-bar">
                    <img src="icons/search icon.svg" alt="search icon">
                    <input type="text" placeholder="Hinted search text" required>
                </div>
            </form>
            <div class="images-bar">
                <img src="icons/Home.svg" alt="home" width="20" height="20">
                <img src="icons/Shopping cart.svg" alt="Shopping" width="20" height="20">
                <img src="icons/list.svg" alt="list" width="20" height="20">
                <img src="icons/Feedback.svg" alt="Feedback" width="20" height="20">
                <img src="icons/BOT.svg" alt="BOT" width="20" height="20">
                <a href="login.php">
                    <img src="icons/User.svg" alt="user" width="20" height="20">
                </a>
                <a href="postad.html">
                    <img src="icons/add-button-svgrepo-com.svg" alt="add" width="20" height="20">
                </a>
            </div>
        </header>
    </div>

    <br><br><br>

    <?php
    include('conf.php');

    $ID=$_GET['id'];
    $UP=mysqli_query($con, "SELECT * FROM products WHERE id=$ID");
    $DATA=mysqli_fetch_array($UP);
    $categories_query = "SELECT * FROM categories";
    $categories_result = mysqli_query($con, $categories_query);
    ?>
    <center>
        <div class="main">
            <form action="update.php" method="post" enctype="multipart/form-data"><!--المالتلي دي علشان اقولو اني هاخد صوره للعربيه الي برفعها جديد ع الماركت-->
                <h2>Edit Product Information</h2>
                <br>
                <input type="text" name='id' value='<?php echo $DATA['Id']?>' style='display:none;'><!--انا هنا خفيت الانبوت بتاع الاي دي علشان محدش يلعب فيه وهو بيعدل العربيه كده كده حتي لو لعب فيه مش هيتغير ومش هيعمل ايرور-->
                <br>
                <input type="text" name='name' class="uploadInput" value='<?php echo $DATA['Name']?>'>
                <br>
                <input type="text" name='price' class="uploadInput" value='<?php echo $DATA['Price']?>'>
                <br>
                <select name="category_id" class="uploadInput" required>
                    <option value="">Select Category</option>
                    <?php while ($cat_row = mysqli_fetch_assoc($categories_result)) { ?>
                        <option value="<?php echo $cat_row['id']; ?>" 
                            <?php echo ($cat_row['id'] == $DATA['category_id']) ? 'selected' : ''; ?>>
                            <?php echo $cat_row['name']; ?>
                        </option>
                    <?php } ?>
                </select>
                <br>
                <input type="file" name='image' id="file" class="uploadInput" style='display:none;'>
                <br>
                <label for="file" class="uploadLabel">Update Product Photo</label>
                <br>
                <button name='update' type='submit' id="btnDone">Update</button>
                <br><br>
                <a href="products.php" class="uploadA">View All Products</a>
            </form>
        </div>
        <p>Developed By Hasnaa ABDO</p>
    </center>

    <footer>
        <div class="main-container">
            <div class="footer-top">
                <div class="col">
                    <div class="head-title">
                        <h2>Basic Links</h2>
                    </div>
                    <div class="content">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Contacr Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="head-title">
                        <h2>social Media</h2>
                    </div>
                    <div class="content">
                        <div class="social-icons">
                            <a href="https://facebook.com" target="_blank">
                                <img src="icons/Facebook.svg" alt="Facebook" class="icon">
                            </a>
                            <a href="https://instagram.com" target="_blank">
                                <img src="icons/Instagram.svg" alt="Instagram" class="icon">
                            </a>
                            <a href="https://twitter.com" target="_blank">
                                <img src="icons/Twitter.svg" alt="Twitter" class="icon">    
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="head-title">
                        <h2>Contact Information</h2>
                    </div>  
                    <div class="content">
                        <div class="info-item">
                            <img src="icons/phone.svg" alt="Phone" class="icon">
                            <p> 0000 0000 0000</p>
                        </div>
                        angelscriptCopy
                        <div class="info-item">
                            <img src="icons/Email.svg" alt="Email" class="icon">
                            <a href="mailto:homemade123@gmail.com" class="link">homemade123@gmail.com</a>
                        </div>
                        <div class="info-item">
                            <img src="icons/location_on.svg" alt="Location" class="icon">
                            <p> We are located in Cairo, Fayoum</p>
                        </div>
                    </div>
                </div>
            </div>    
        </div>

        <div class="footer-bottom">
            <div class="payment-method">
                <ul>
                    <li><a href="#"><i class="fa-brands fa-cc-visa"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-cc-mastercard"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-cc-paypal"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-cc-amex"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-cc-amazon-pay"></i></a></li>
                </ul>
            </div>
            <div class="copyright">
                <p>
                    Copyright ©2024 All rights reserved| This template is made with
                    <i class="fa-solid fa-heart"></i>
                    by
                    <a href="#">Craft Team</a>
                </p>
            </div>
        </div>
    </footer>

</body>
</html>