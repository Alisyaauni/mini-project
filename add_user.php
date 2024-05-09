<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add User</h1>
        <form action="" method="POST">
            <input type="text" name="firstname" placeholder="Enter firstname" required>
            <input type="email" name="email" placeholder="Enter email" required>
            <input type="password" name="password" placeholder="Enter password" required>
            <input type="submit" name="submit" value="Add User">
        </form>

        <?php
        if(isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "churegdb");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Insert new user into database
            $sql = "INSERT INTO RegTable (firstname, email, password) VALUES ('$firstname', '$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "User added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            // Close connection
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
