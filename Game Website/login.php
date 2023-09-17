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

if (isset($_POST['submit-button'])){
  $name = $_POST['name'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE user='$name'";
  $result = $mysqli->query($sql);
  if ($result !== false && $result->num_rows > 0) {
    // output data of each row
    while($user = $result->fetch_assoc()) {
      if ($password == $user['password']) {

        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        
        if ($_SESSION['role'] == 'customer') {
    
        header('Location: orders.php');
        exit();
        } else if ($_SESSION['role'] == 'administrator'){
          header('Location: admin.php');
          exit();
        }
        
      } else {
        echo 'Invalid login details';
      }
      }
} else {
    echo "User doesn't exist";
}
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
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
      <h1>Login</h1>
      <form action="login.php" method="POST" autocomplete="on">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="submit-button">Submit</button>
      </form>
    </div>
    <footer>
      <p>&copy; 2023 GAME X. All rights reserved.</p>
      </footer>
</body>
</html>
