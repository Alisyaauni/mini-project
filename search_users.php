<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Users</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Search Users</h1>
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Enter firstname or email">
            <input type="submit" value="Search">
        </form>

        <?php
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            // Connect to database
            $conn = mysqli_connect("localhost", "root", "", "churegdb");
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve users from database based on search query
            $sql = "SELECT * FROM RegTable WHERE firstname LIKE '%$search%' OR email LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);

            // Display search results in a table
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>firstname</th><th>Email</th><th>Action</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["firstname"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td><a href='edit_user.php?id=".$row["id"]."'>Edit</a> | <a href='delete_user.php?id=".$row["id"]."'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No users found";
            }

            // Close connection
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>
