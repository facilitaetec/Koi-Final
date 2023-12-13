<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbkoi = "bd_koi";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbkoi", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

session_start();