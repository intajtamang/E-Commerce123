<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye-Vision Nepal | Admin</title>
    <link rel="stylesheet" href="css/admin.css">
    <!--Box icon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<?php

                
if($_SERVER['REQUEST_METHOD'] == 'POST'){


                $username = "root";
                $password = "";
                $database = "new_db";
                $tablename = "products";


                $name = $_POST['name'];
                $image = "images/".$_POST['image'];
                $price = $_POST['price'];
                
                $con = mysqli_connect("localhost", $username, $password, $database);
                
                if (!$con) {
                    die("Connection failed:" . mysqli_connect_error());
                }

                
                else{

                    $sql = "insert into products(name, image, price) values('".$name."','".$image."',".$price.")";
                    // $result = mysqli_query($con, $sql);


                    if ($con->query($sql) === TRUE) {
                        echo "New record created successfully";
                      } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                      }

                    // if($result){
                    //         echo "The record was inserted succesfully";
                    // }
                    // else{
                    //     echo "The record was not inserted! sorry!".mysqli_error($con);

                    // }

                }



}

                
        ?>



                <form action="admin.php" method="POST" >

                    <input type="text" name="name" value="" placeholder="INsert Name"><br>
                    <input type="text" name="image" value="etsy.jpg" placeholder="insert image name"><br>
                    <input type="number" name="price" value="" placeholder="Insert Price"><br>
                    <input type="submit" value="Submit">
                </form>

</body>
</html>