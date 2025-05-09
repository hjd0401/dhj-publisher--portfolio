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
    $email = $_POST['email'];
    $input_password = $_POST['pswd'];

    //Basic validation
    if (empty($email) || empty($input_password)) {
        echo "Both fields are required!";
    } else {
        //Query to check if the owner exists
        $sql = "SELECT * FROM owners WHERE email = '$email'";
        $result = $conn->query($sql);

        //If the user is found
        if ($result->num_rows > 0) {
            $owner = $result->fetch_assoc();
            $stored_password = $owner['password'];

            //Verify the password
            if (password_verify($input_password, $stored_password)) {
                echo "Login successful!";
                //Redirect to the owner's dashboard here
                header("Location: /Project/Home/homepage.html");

            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No owner found with this email.";
        }
    }
}

$conn->close();
?>
