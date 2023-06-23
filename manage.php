<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecom";
$tablename = "products";

// Create a database connection
$connection = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the product details from the form
    $title = $_POST["title"];
    $price = $_POST["price"];

    // Prepare the SQL statement
    $sql = "INSERT INTO $tablename (name, price) VALUES ('$title', '$price')";

    // Execute the SQL statement
    if (mysqli_query($connection, $sql)) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>


<?php  
            
            $con3 = mysqli_connect("localhost",  "root", "", "new_db");
            
            $sql3 = "SELECT id, name, price, image, quantity FROM cart";
            $result2 = $con3->query($sql3);
            
            

            while($row = $result2->fetch_assoc()) {

                echo '<div class="cart-content">
                <img src="'.$row["image"].'" alt="" class="cart-img">
                <div class="detail-box">
                <div class="cart-product-title">'.$row["name"].'...'.$row["quantity"].'</div>
                    <div class="cart-price">'.$row["total_price"].'</div>
                </div>
                </div>';

            }
            ?>