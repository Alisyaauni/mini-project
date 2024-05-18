<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Styles as defined above */
        body, h1, form, table {
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f3e5ab; /* Light coffee background color */
            color: #4b3832; /* Darker text color */
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff; /* White background for the container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Slight shadow for depth */
            border-radius: 8px; /* Rounded corners */
            text-align: center;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 2.5em;
            color: #6f4e37; /* Coffee brown color */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd; /* Light border */
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #d7ccc8; /* Light coffee color for headers */
            color: #4b3832; /* Darker text color */
        }

        tr:nth-child(even) {
            background-color: #f5f5f5; /* Alternating row colors */
        }

        tr:hover {
            background-color: #e0e0e0; /* Row highlight on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Users</h1>
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
                echo "<table>";
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
    </div>
</body>
</html>

