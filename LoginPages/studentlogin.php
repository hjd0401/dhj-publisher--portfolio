<?php
// Database connection settings
$host = 'localhost'; 
$dbname = 'homeseek';  
$username = 'root';  
$password = '';  

// Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Determine if this is a login or sign-up attempt
    $is_signup = isset($_POST['txt']); // Check if 'txt' (username) is submitted

    if ($is_signup) {
        // Handle sign-up
        $user_name = $_POST['txt'];
        $email = $_POST['email'];
        $password = $_POST['pswd'];

        // Basic validation
        if (empty($user_name) || empty($email) || empty($password)) {
            echo "All fields are required!";
        } else {
            // Hash password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert data into the database
            $sql = "INSERT INTO students (username, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $user_name, $email, $hashed_password);

            if ($stmt->execute()) {
                echo "Sign-up successful!";
                header("Location: Project/Home/homepage.html"); 
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    } else {
        // Handle login
        $email = $_POST['email'];
        $password = $_POST['pswd'];

        // Basic validation
        if (empty($email) || empty($password)) {
            echo "All fields are required!";
        } else {
            // Verify user
            $sql = "SELECT password FROM students WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($hashed_password);

            if ($stmt->fetch() && password_verify($password, $hashed_password)) {
                $message = "Login successful!";
                echo "<script>alert('$message');</script>";
                header("Location: /Project/Home/homepage.html"); 
                exit();
            } else {
                echo "Invalid email or password.";
            }
        }
    }
}

$conn->close();
?>
