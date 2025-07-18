<?php
$host = 'mythological-creatures.mysql.database.azure.com';  // Your Azure MySQL server hostname
$dbname = 'mythological_creatures';  // Your database name
$username = 'user_admin@mythological-creatures';  // Your MySQL username (with server name)
$password = 'Polipopo07!';  // Your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
