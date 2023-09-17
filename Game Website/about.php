<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="about.css">
    <script src="about.js"></script>
</head>
<body>
    <main>
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
        <br>
      
        <div class="assassins">
            <img src="assassins-creed-valhalla.jpg" alt="assassins creed">
        </div>
    
	    <div class="about">
		    <h1>About Us</h1>
		    <p>We are the Leaders in Online Retail for Games and Consoles and we are passionate about delivering the lastest games to our customers. With years of experience in the industry, we have the expertise to deliver the lastest Games to our customers.</p>
            <p>We are <b style="color: red;">GAME X</b></p>
            <p>Impossible is Nothing</p>
	    </div>
        <br><br><br><br><br>
    </main>
    
    <footer>
		<p>&copy; 2023 GAME X. All rights reserved.</p>
    </footer>
</body>
</html>