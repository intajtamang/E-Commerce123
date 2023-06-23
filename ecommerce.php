<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye-Vision Nepal</title>
    <link rel="stylesheet" href="css/style123.css">
    <!--Box icon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
        <?php
                $con1 = mysqli_connect("localhost",  "root", "", "new_db");
                if (!$con1) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $cart_name = $_POST['name'];
                $quantity = $_POST['quantity'];
                $cart_image = "images/".$_POST['image'];
                $total_price = $_POST['price'] * $_POST['quantity'];
                $sql = "insert into cart(name, image, total_price, quantity) values('".$cart_name."','".$cart_image."',".$total_price.",".$quantity.")";
                    if ($con1->query($sql) === TRUE) {
                        echo "New cart created successfully";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }

}
        ?>

    <!--Header-->
    <header>
        <div class="nav container">
            <a href="#" class="logo">Eye Vision Nepal</a>
            <i class='bx bx-shopping-bag' id="cart-icon"></i>
            <!--Cart-->
            <div class="cart">
                <h2 class="cart-title">Your Cart</h2>
                <!--Content-->
               
                <div class="total">
                    <div class="total-title">Total</div>
                    <div class="total-price">$0</div>
                </div>
                <!--Buy Button-->
                <button type="button" class="btn-buy">Buy Now</button>
                <!--Cart Close-->
                <i class="bx bx-x" id="close-cart"></i>
            </div>
        </div>
    </header>

    <!--Shop-->
    <section class="shop container">
        <h2 class="section-title">Shop Products</h2>
        <div class="shop-content">
            <?php  
            
            $con2 = mysqli_connect("localhost",  "root", "", "new_db");
            
            $sql2 = "SELECT id, name, price, image FROM products";
            $result = $con2->query($sql2);
            
            

            while($row = $result->fetch_assoc()) {


                echo ' <form action="ecommerce.php" method="POST">
                     <div class="product-box">
                         <img src="'.$row["image"].'" alt="" class="product-img">
                         <h2 class="product-title">'.$row["name"].'</h2>
                         <span class="price"> Rs. '.$row["price"].'</span>
                         <br>
                        
                         <input type="number" name="quantity" value="1">
                         <input type="submit" value="Add to cart" style="background-color: blue, padding:4px">
                     </div>

                     <input type="text" name = "name" value ="'.$row["name"].'" hidden>
                     <input type="text" name = "image" value ="'.$row["image"].'" hidden>
                     <input type="number" name = "price" value ="'.$row["price"].'" hidden>
                     
                     </form> ';
              }
                
            ?>
        </div>
    </section>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Our services</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Affiliate Program</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Get Help</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                        </ul>
                    </div><div class="footer-col">
                        <h4>Online shop</h4>
                        <ul>
                            <li><a href="#">Glasses</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow Us</h4>
                        <div class="social-links">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/accounts/login/"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <script src="main123.js"></script>
</body>
</html>