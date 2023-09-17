<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
      <h1>Contact Us</h1>
      <p>Feel free to send us your inquiries or feedback using the form below.</p>
      <form id="contact-form">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" id="submit">Submit</button>
      </form>
    </div>
    <footer>
      <p>&copy; 2023 GAME X. All rights reserved.</p>
      </footer>
      <script src="contact.js"></script>
</body>
</html>
