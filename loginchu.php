<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "churegdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Form submitted
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($email) && !empty($password) && !is_numeric($email)) {
            // Sanitize input to prevent SQL injection
            $email = mysqli_real_escape_string($conn, $email);

            // Query database for user
            $query = "SELECT * FROM RegTable WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($password === $user_data['password']) {
                    $_SESSION['email'] = $user_data['email'];
					
					
                    // Redirect to chuucoffeemenu.html after successful login	
                    header("Location: chuucoffeemenu.html");
                    exit;
                } else {
                    echo "Incorrect password.";
                }
            } else {
                echo "User not found.";
            }
        } else {
            echo "Please enter valid email and password.";
        }
    }
}
?>