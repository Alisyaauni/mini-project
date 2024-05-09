<?php
if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "churegdb");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Delete user record from the database
    $sql = "DELETE FROM RegTable WHERE id='$user_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "User ID not provided";
}
?>
