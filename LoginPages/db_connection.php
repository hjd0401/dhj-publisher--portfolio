<?php
// db_connection.php
$host = 'localhost'; // localhost for XAMPP
$dbname = 'homeseek'; // Your database name
$dbuser = 'root'; // MySQL default user for XAMPP
$dbpass = ''; // No password by default for XAMPP

// Create PDO connection
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; // Optional for debugging
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
