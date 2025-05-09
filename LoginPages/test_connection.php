<?php
include('db_connection.php');

// Example query to fetch all owners
$query = $conn->query("SELECT * FROM owners");

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "Username: " . $row['username'] . "<br>";
    echo "Email: " . $row['email'] . "<br>";
    echo "Company Name: " . $row['company_name'] . "<br><br>";
}
?>
