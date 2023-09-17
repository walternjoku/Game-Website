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
            <li><button id="homepage" onclick="gotohomepage()">Homepage</button></li>
            <li><button id="about" onclick="gotoabout()">About Us</button></li>
            <li><button id="contact" onclick="gotocontact()">Contact Us</button></li>
            <li><button id="links" onclick="gotolinks()">Links</button></li>
            <li><button id="search" onclick="gotosearch()">Search</button></li>
            <li><button id="order" onclick="gotoorder()">Order</button></li>
        </ul>
    </nav>

    <h1>Products for Sale</h1>
    <div id="product-container"></div>
    <?php include "products.php";?> 
    
    


    <footer>
        <p>&copy; 2023 GAME X. All rights reserved.</p>
    </footer>
</body>
</html>