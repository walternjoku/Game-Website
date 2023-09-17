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

  $sql = "SELECT * FROM games LIMIT 6";
  $result = $mysqli->query($sql);
  
  $mysqli->close();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="homepage1.css">
    <script src="homepage.js"></script>
</head>
<body>
	<header>
		<h1>Welcome 2 GAME X</h1>
	</header>
	<nav>
		<ul id="navcenter">
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
    <br>
	<main>
		<div id="abt">
			<h2 id="abtus">About Our Website</h2>
            <p>this is an online retail site for game x</p>
			<p>We are an Online Retail Sellers of Videos Games</p>
        </div><br><br>
        <div class="gamespic">
        <?php
        if ($result !== false && $result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
              <img src="<?php echo $row["image"]?>" alt="<?php echo $row["game"]?>">
          <?php
            }
      } else {
          echo "0 results";
      }
      ?>

        </div>
    
    </main>

	<footer>
		<p>&copy; 2023 GAME X. All rights reserved.</p>
    </footer>
</body>
</html>

</body>
</html>