<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .container {
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Welcome to the Dashboard</h2>

    <?php
    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "reglog");

    // Function to display a table
    function displayTable($conn, $tableName) {
        $sql = "SELECT * FROM $tableName";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<h3>Data from '$tableName' table:</h3>";
            echo "<table>";
            // Display table headers
            echo "<tr>";
            while ($fieldinfo = mysqli_fetch_field($result)) {
                echo "<th>" . $fieldinfo->name . "</th>";
            }
            echo "</tr>";
            // Display table data
            $rowNum = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
                $rowNum++;
            }
            echo "</table>";
        } else {
            echo "No data found in the '$tableName' table.";
        }
    }

    // Display the tables
    displayTable($conn, 'payment');
    displayTable($conn, 'consultant');
    displayTable($conn, 'tb_user');
    displayTable($conn, 'reviews');


    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
