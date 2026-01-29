<?php
$host = 'localhost';
$username = 'root';
$password = '';

try {
    // Connect without database
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS guidance_monitoring_system");

    echo "Database 'guidance_monitoring_system' created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
