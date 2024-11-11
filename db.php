<?php
$host = 'localhost';
$dbname = 'ticketing_platform';
$user = 'root'; // Typically 'root' on XAMPP unless you've set a password
$pass = '';     // Leave blank if no password is set

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
