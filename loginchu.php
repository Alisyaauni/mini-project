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
					
					
                    // Redirect to myfirstwebsite.html after successful login	
                    header("Location: myfirstwebsite.html");
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

<!DOCTYPE html>
<html>
<head>
    <title>ChuuLogin</title>
    <style>
        body {
            text-align: center;
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        form {
            margin-top: 50px;
            display: inline-block;
        }
        table {
            margin: 0 auto;
        }
        img {
            display: block;
            margin: 0 auto 20px;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 250px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <table border="0">
            <tr>
                <td colspan="2">
                    <img src="gambar/cat.png" width="100" height="100" alt="Cat Image">
                </td>
            </tr>
            <tr>
                <td style="text-align: right;"><font color="brown" size="5">Email:</font></td>
                <td style="text-align: left;"><input type="text" name="email"></td>
            </tr>
            <tr>
                <td style="text-align: right;"><font color="brown" size="5">Password:</font></td>
                <td style="text-align: left;"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">
                    <input type="submit" value="Login"/>
                    <a href="chuulogincoffee.php">Register</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>


