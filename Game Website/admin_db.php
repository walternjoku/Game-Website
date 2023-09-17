<?php
$host = "localhost";

$username = "root";

$password = "usbw";

$database_name = "gamex";

$port = 3307;

    function pdo_connect(){
        try {
            return new PDO('mysql:host=localhost;port=3307;dbname=gamex','root','usbw');
        } catch (PDOException $exception) {
            //show if there is an error with the connection
            exit('Failed to connect to the database');
        }
    }
?>