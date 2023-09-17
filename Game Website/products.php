<?php

session_start();

$host = "localhost";

$username = "root";

$password = "usbw";

$database_name = "gamex";

$port = 3307;


$mysqli = new mysqli($host, $username, $password, $database_name, $port);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  $sql = "SELECT * FROM games";
  $result = $mysqli->query($sql);
  
  $mysqli->close();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="products.css">
    <script src="products.js"></script>
    
</head>
<body>
    <nav>
        <ul class="navcenter">
        <li><button id="entrance" onclick="gotoentrance()">Entrance</button></li>
			<li><button id="about" onclick="gotoabout()">About Us</button></li>
			<li><button id="contact" onclick="gotocontact()">Contact Us</button></li>
            <li><button id="links" onclick="gotolinks()">Links</button></li>
            <li><button id="products" onclick="gotoproducts()">Our Products</button></li>
            <li><button id="search" onclick="gotosearch()">Search</button></li>
            <li><button id="order" onclick="gotoorder()">Order</button></li>
            <li><button id="login" onclick="gotologin()">Login</button></li>
            <li><button id="register"onclick="gotoregister()">Register</button></li>
            <li><button id="logout" onclick="gotologout()">Logout</button></li>
        </ul>
    </nav>

    <h1>Products for Sale</h1>
    <div id="product-container">
      <?php
        if ($result !== false && $result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
              <div class="product" style="text-align: center;">
              <img src="<?php echo $row["image"]?>" alt="<?php echo $row["game"]?>">
              <h2><?php echo $row["game"]?></h2>
              <p>£<?php echo $row["price"]?></p>
              <button onclick="window.location.href = 'order.php'">Order</button>
              </div>
          <?php
            }
      } else {
          echo "0 results";
      }
      ?>
    </div>
    


    <footer>
        <p>&copy; 2023 GAME X. All rights reserved.</p>
    </footer>
</body>
</html>