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
    <title>Order</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
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
      <h1>Order</h1>
      <p>Feel free to send us your order using the form below.</p>
      <form id="order-form" autocomplete="on">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="game">Subject</label>
          <select id="game" required>
          <?php
        if ($result !== false && $result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
              <option value="<?php echo $row["game"]?>"><?php echo $row["game"]?></option>
              <?php
          }
        }
          ?>
          
          </select>
        </div>
        <div class="form-group">
          <label for="message">Additional Message:</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" id="submit-button">Submit</button>
      </form>
      <div id="status-message"></div>
    </div>
    <footer>
      <p>&copy; 2023 GAME X. All rights reserved.</p>
      </footer>
      <script src="order.js"></script>
</body>
</html>
