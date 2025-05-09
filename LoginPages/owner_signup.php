<?php
//Database connection settings
$host = 'localhost'; 
$dbname = 'homeseek';  
$username = 'root';  
$password = '';  

//Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

//Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['txt'];
    $email = $_POST['email'];
    $company_name = $_POST['company'];
    $password = $_POST['pswd'];
    
    //Basic validation
    if (empty($user_name) || empty($email) || empty($company_name) || empty($password)) {
        echo "All fields are required!";
    } else {
        //Hash password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //Insert data into the database
        $sql = "INSERT INTO owners (username, email, company_name, password) 
                VALUES ('$user_name', '$email', '$company_name', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo "Sign-up successful!";
            header("Location: /Project/Home/homepage.html"); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
