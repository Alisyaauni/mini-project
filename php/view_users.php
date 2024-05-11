<?php
    // Connect to database
    $conn = mysqli_connect("localhost", "root", "", "churegdb");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve users from database
    $sql = "SELECT * FROM RegTable";
    $result = mysqli_query($conn, $sql);

    // Display users in a table
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>First Name</th><th>Email</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["email"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No users found";
    }

    // Close connection
    mysqli_close($conn);
?>
