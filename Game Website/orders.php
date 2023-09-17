<?php

session_start();


$host = "localhost";

$username = "root";

$password = "usbw";

$database_name = "gamex";

$port = 3307;


$mysqli = new mysqli($host, $username, $password, $database_name, $port);

$user = $_SESSION['id'];

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  $sql = "SELECT * FROM orders WHERE user='$user'";
  $result = $mysqli->query($sql);
  $mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" type="text/css" href="orders.css">
    <script src="contact.js"></script>
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
    <div class="container">
      <h1>Your Orders</h1>
      <p>See your existing games orders below.</p>
      <table>
            <thead>
                <tr>
                <td>#</td>
                <td>Game</td>
                <td>Quantity</td>
                <td>Date</td>
                </tr>
            </thead>
            <tbody>
            <tr>
            <?php
                if ($result !== false && $result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <td><?=$row['id']?></td>
                    <td><?=$row['game']?></td>
                    <td><?=$row['quantity']?></td>
                    <td>$<?=$row['date']?></td>
                    </tr>
                <?php
                    }
            } else {
                echo "0 results";
            }
            ?>
            </tbody>
        </table>
      
    </div>
    </div>
    <footer>
      <p>&copy; 2023 GAME X. All rights reserved.</p>
      </footer>
</body>
</html>