<?php
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

$sql = "INSERT INTO RegTable (firstname, lastname, email,password)
VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]', '$_POST[password]')";

if ($conn->query($sql) === TRUE) {
	
    echo "Record created";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>