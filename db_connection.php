<?php
// Database connection settings
$host = 'localhost:3307';
$username = 'root';
$password = '';
$dbname = 'validation_form';

// Establish a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
