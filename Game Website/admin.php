<?php
// Start the session
session_start();

// Include the database connection file
include 'admin_db.php';

// Connect to the database
$pdo = pdo_connect();

// Fetch the games, users, and orders from the database
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM games");
$stmt->execute();
$games = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM orders");
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create a new user
if (isset($_POST['new_account_submit'])) {
    $name = $_POST['account_name'];
    $password = $_POST['account_password'];
    $role = $_POST['account_role'];

    $stmt = $pdo->prepare("INSERT INTO users (user, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$name, $password, $role]);

    header("location: admin.php");
}

// Create a new game
if (isset($_POST['create_game_submit'])) {
    $game_title = $_POST['game_title'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $stmt = $pdo->prepare("INSERT INTO games (game, price, image) VALUES (?, ?, ?)");
    $stmt->execute([$game_title, $price, $image]);

    header("location: admin.php");
}

// Create a new order
if (isset($_POST['create_order_submit'])) {
    $user = $_POST['user_id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO orders (user, game, quantity, date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user, $name, $quantity, $date]);

    header("location: admin.php");
}

// Update a user
if (isset($_POST['update_account_submit'])) {
    $update_id = $_POST['account_id'];
    $update_name = $_POST['account_name'];
    $update_password = $_POST['account_password'];
    $update_role = $_POST['account_role'];

    $stmt = $pdo->prepare("UPDATE users SET user='$update_name', password='$update_password', role='$update_role' WHERE id='$update_id'");
    $stmt->execute();

    header("location: admin.php");
}

//update game
if (isset($_POST['update_game_submit'])) {
    $update_id = $_POST['id'];
    $update_game_title = $_POST['game_title'];
    $update_price = $_POST['price'];
    $update_image_link = $_POST['image'];

    $stmt = $pdo->prepare("UPDATE games SET game='$update_game_title', price='$update_price', image='$update_image_link' WHERE id='$update_id'");

    $stmt->execute();

    header("location: admin.php");
}

//update order
if (isset($_POST['update_order_submit'])) {
    $update_id = $_POST['id'];
    $update_user = $_POST['user_id'];
    $update_name = $_POST['name'];
    $update_quantity = $_POST['quantity'];
    $update_price = $_POST['price'];
    $update_order_date = $_POST['date'];

    $stmt = $pdo->prepare("UPDATE orders SET user='$update_user', game='$update_name', quantity='$update_quantity', date='$update_order_date' WHERE id='$update_id'");

    $stmt->execute();

    header("location: admin.php");
}

//delete user
if (isset($_GET['delete_account'])) {
    // get user info
    $account_id = $_GET['delete_account'];
    $stmt = $pdo->prepare("DELETE FROM users WHERE id='$account_id'");
    $stmt->execute();
    header("location: admin.php");
}

//delete game
if (isset($_GET['delete_game'])) {
    // get game info
    $game_id = $_GET['delete_game'];
    $stmt = $pdo->prepare("DELETE FROM games WHERE id='$game_id'");
    $stmt->execute();
    header("location: admin.php");
}

//delete order
if (isset($_GET['delete_order'])) {
    // get order info
    $order_id = $_GET['delete_order'];
    $stmt = $pdo->prepare("DELETE FROM orders WHERE id='$order_id'");
    $stmt->execute();
    header("location: admin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <script src="admin.js"></script>
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

    <h1>Welcome to the Administrator Section</h1>
    <section>
  
    <h2>Edit Accounts</h2>
    <table>
            <thead>
                <tr>
                <td>#</td>
                <td>Name</td>
                <td>Password</td>
                <td>Role</td>
                <td></td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($accounts as $account){ ?>
                <td><?=$account['id']?></td>
                <td><?=$account['user']?></td>
                <td><?=$account['password']?></td>
                <td><?=$account['role']?></td>
                <td>
                    <a href="admin.php?update_account=<?=$account['id']?>">Update</a>
                    <a href="admin.php?delete_account=<?=$account['id']?>">Delete</a>
                </td>
                </tr>
                <?php }; ?>
            </tbody>
    </table>
    <a href="admin.php?create_account">Create Account</a>
    <?php

            // Check for user in the url
            if (isset($_GET['create_account'])) {
 
            ?>
                <form method="post" action="admin.php">
                <label>Name:</label>
                <input type="text" name="account_name">
                <label>Password:</label>
                <input type="text" name="account_password">
                <label>Role:</label>
                <input type="text" name="account_role">
                <input type="submit" name="new_account_submit" value="Create Account">
                </form>
            <?php 
            } ?>

            <?php
            // Check for user in the url
            if (isset($_GET['update_account'])) {
                // get user info
                $update_account_id = $_GET['update_account'];
                $stmt = $pdo->prepare("SELECT * FROM users WHERE id='$update_account_id'");
                $stmt->execute();
                $update_account = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
                <form method="post" action="admin.php">
                <input type="hidden" name="account_id" value="<?php echo $update_account['id']; ?>">
                <label>Name:</label>
                <input type="text" name="account_name" value="<?php echo $update_account['user']; ?>">
                <label>Password:</label>
                <input type="text" name="account_password" value="<?php echo $update_account['password']; ?>">
                <label>Role:</label>
                <input type="text" name="account_role" value="<?php echo $update_account['role']; ?>">
                <input type="submit" name="update_account_submit" value="Update Account">
                </form>
            <?php } ?>
  
    <h2>Edit Games</h2>
    <table>
            <thead>
                <tr>
                <td>#</td>
                <td>Game Title</td>
                <td>Price</td>
                <td>Image</td>
                <td></td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($games as $game): ?>
                <td><?=$game['id']?></td>
                <td><?=$game['game']?></td>
                <td><?=$game['price']?></td>
                <td><?=$game['image']?></td>
                <td>
                    <a href="admin.php?update_game=<?=$game['id']?>">Update</a>
                    <a href="admin.php?delete_game=<?=$game['id']?>">Delete</a>
                    
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="admin.php?create_game">Create Game</a>
        <?php
            // Check for user in the url
            if (isset($_GET['create_game'])) {
 
            ?>
                <form method="post" action="admin.php">
                <label>Name:</label>
                <input type="text" name="game_title">
                <label>Price:</label>
                <input type="number" name="price">
                <label>Image Link:</label>
                <input type="text" name="image">
                <input type="submit" name="create_game_submit" value="Create Game">
                </form>
            <?php
                
        
                } ?>
                
        <?php
                // Check for user in the url
                if (isset($_GET['update_game'])) {
                // get user info
                $game_id = $_GET['update_game'];
                $stmt = $pdo->prepare("SELECT * FROM games WHERE id='$game_id'");
                $stmt->execute();
                $update_game = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
                <form method="post" action="admin.php">
                <input type="hidden" name="id" value="<?php echo $update_game['id']; ?>">
                <label>Game Title:</label>
                <input type="text" name="game_title" value="<?php echo $update_game['game']; ?>">
                <label>Price:</label>
                <input type="number" name="price" value="<?php echo $update_game['price']; ?>">
                <label>Image:</label>
                <input type="text" name="image" value="<?php echo $update_game['image']; ?>">
                <input type="submit" name="update_game_submit" value="Update Game">
                </form>
            <?php } ?>
    
  
    <h2>Edit Orders</h2>
    <table>
            <thead>
                <tr>
                <td>ID</td>
                <td>User ID Number</td>
                <td>Name of Game</td>
                <td>Quantity</td>
                <td>Order Date</td>
                <td></td>
                </tr>
            </thead>
            <tbody>
            <tr>
                <?php foreach ($orders as $order): ?>
                <td><?=$order['id']?></td>
                <td><?=$order['user']?></td>
                <td><?=$order['game']?></td>
                <td><?=$order['quantity']?></td>
                <td><?=$order['date']?></td>
                <td>
                    <a href="admin.php?update_order=<?=$order['id']?>">Update</a>
                    <a href="admin.php?delete_order=<?=$order['id']?>">Delete</a>
                    
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="admin.php?create_order">Create Order</a>
        <?php
            // Check for user in the url
            if (isset($_GET['create_order'])) {
 
            ?>
                <form method="post" action="admin.php">
                <label>User:</label>
                <input type="text" name="user_id">
                <label>Order Name:</label>
                <input type="text" name="name">
                <label>Quantity:</label>
                <input type="number" name="quantity">
                <label>Order Date:</label>
                <input type="date" name="date">
                <input type="submit" name="create_order_submit" value="Create Order">
                </form>
            <?php } ?>
                
            <?php
                // Check for user in the url
                if (isset($_GET['update_order'])) {
                // get user info
                $order_id = $_GET['update_order'];
                $stmt = $pdo->prepare("SELECT * FROM orders WHERE id='$order_id'");
                $stmt->execute();
                $update_order = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
                <form method="post" action="admin.php">
                <input type="hidden" name="id" value="<?php echo $update_order['id']; ?>">
                <label>User ID:</label>
                <input type="number" name="user_id" value="<?php echo $update_order['user']; ?>">
                <label>Game:</label>
                <input type="text" name="name" value="<?php echo $update_order['game']; ?>">
                <label>Quantity:</label>
                <input type="number" name="quantity" value="<?php echo $update_order['quantity']; ?>">
                <label>Order Date:</label>
                <input type="date" name="date" value="<?php echo $update_order['date']; ?>">
                <input type="submit" name="update_order_submit" value="Update Order">
                </form>
            <?php } ?>
    
</section>
    


    <footer>
        <p>&copy; 2023 GAME X. All rights reserved.</p>
    </footer>
</body>
</html>