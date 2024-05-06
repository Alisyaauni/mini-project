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

$user_data = check_login($conn);

function check_login($conn) {
    // Check if user is logged in or perform any other necessary checks
    // Return user data if logged in, or false otherwise
    // For example:
    if (isset($_SESSION['email'])) {
        // Retrieve user data from database based on session information
        $email = $_SESSION['email'];
        // Changed $email to '$email' to make it a string in the query
        $query = "SELECT * FROM RegTable WHERE email = '$email'";
        // Used $conn for mysqli_query instead of mysqli_ function
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            // User not found, log out or handle the situation accordingly
            return false;
        }
    } else {
        // User not logged in, return false
        return false;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ChuuCoffee Registration</title>
    <style>
        body {
            text-align: center;
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        form {
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="addrecord.php" method="post">
        <table align="center" border="0">
            <tr>
                <td colspan="2"><h2>ChuuCoffee Registration</h2></td>
            </tr>
            <tr>
                <td><font color="brown" size="5">First Name:</font></td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <td><font color="brown" size="5">Last Name:</font></td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td><font color="brown" size="5">Email:</font></td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td><font color="brown" size="5">Password:</font></td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" value="Register"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="cat.png" alt="Cat Image" width="150" height="150">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>



