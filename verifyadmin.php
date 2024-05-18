<?php
// Define the correct password for the admin
$correct_password = "123";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the password from the form submission
    $password = $_POST['password'];

    // Verify the password
    if ($password === $correct_password) {
        // Redirect to the admin panel page after successful login as admin
        header("Location: admin.html");
        exit;
    } else {
        // Incorrect password, display an error message
        echo "<script>alert('Incorrect password. Please try again.'); window.location.href='login.html';</script>";
        exit;
    }
} else {
    // If the form has not been submitted, redirect to the login page
    header("Location: login.html");
    exit;
}
?>
