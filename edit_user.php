<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>

        <?php
        if(isset($_GET['id'])) {
            $user_id = $_GET['id'];

            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "churegdb");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve user information based on user id
            $sql = "SELECT * FROM RegTable WHERE id = '$user_id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);

                // Display user information in a form for editing
                echo "<form action='' method='POST'>";
                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                echo "<input type='text' name='firstname' value='".$row['firstname']."' placeholder='Enter firstname' required><br>";
                echo "<input type='email' name='email' value='".$row['email']."' placeholder='Enter email' required><br>";
                echo "<input type='password' name='password' placeholder='Enter new password'><br>";
                echo "<input type='submit' name='submit' value='Update'>";
                echo "</form>";

                if(isset($_POST['submit'])) {
                    $new_username = $_POST['firstname'];
                    $new_email = $_POST['email'];
                    $new_password = $_POST['password'];

                    // Update user information in the database
                    $update_sql = "UPDATE RegTable SET firstname='$new_username', email='$new_email'";
                    if(!empty($new_password)) {
                        // If a new password is provided, update it
                        $update_sql .= ", password='$new_password'";
                    }
                    $update_sql .= " WHERE id='$user_id'";
                    
                    if (mysqli_query($conn, $update_sql)) {
                        echo "User updated successfully";
                    } else {
                        echo "Error updating user: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "User not found";
            }

            // Close connection
            mysqli_close($conn);
        } else {
            echo "User ID not provided";
        }
        ?>
    </div>
</body>
</html>
