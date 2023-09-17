<?php

session_start();

error_reporting(E_ERROR | E_PARSE);

$host = "localhost";

$username = "root";

$password = "usbw";

$database_name = "gamex";

$port = 3307;


$mysqli = new mysqli($host, $username, $password, $database_name, $port);

$search = $_POST['search'];

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }
if (isset($_POST['submit-button'])){
  $sql = "SELECT * FROM games WHERE game LIKE '%$search%'";
  $result = $mysqli->query($sql);
}
  $mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
    <link rel="stylesheet" type="text/css" href="products.css">
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
      <h1>Search</h1>
      <p>Feel free to search for your favourite games below.</p>
      <form action="search.php" method="POST">
        <div class="form-group">
          <label for="name">Search</label>
          <input type="text" id="search" name="search" required>
        </div>
        <button type="submit" name="submit-button">Submit</button>
      </form>
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
    </div>
    <footer>
      <p>&copy; 2023 GAME X. All rights reserved.</p>
      </footer>
</body>
</html>