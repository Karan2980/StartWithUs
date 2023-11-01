<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$conn = mysqli_connect("localhost", "root", "", "reglog");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email');

    if (!empty($email)) {
        // Fetch payment data where email matches
        $sql = "SELECT name, email, amount, consultant, transaction_id FROM payment WHERE email = ?";
        
        // Use prepared statement to avoid SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "<h1>Appointment and Payment Data</h1>";

            // Display payment data here
            echo "<h2>Appointment & Payment History for $email</h2>";
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Sr. No</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Amount</th>";
            echo "<th>Consultant</th>";
            echo "<th>Transaction ID</th>";
            echo "</tr>";

            $rowNum = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $rowNum . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['consultant'] . "</td>";
                echo "<td>" . $row['transaction_id'] . "</td>";
                echo "</tr>";
                $rowNum++;
            }

            echo "</table>";
        } else {
            echo "<h1>No payment records found for $email</h1>";
        }

        $stmt->close();
    } else {
        echo "Email is required to Appointment and Payment Data.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment and Payment Data</title>
    <style>
    body {
        font-family: Arial, sans-serif;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    h2 {
        margin-top: 20px;
        color: #666;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #333;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #333;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:nth-child(odd) {
        background-color: #fff;
    }
    .f1 {
    background-color: #4CAF50; /* Green background color */
    color: white; /* White text color */
    border: none; /* Remove border */
    padding: 10px 20px; /* Add padding to make it larger */
    margin: 5px; /* Add some margin to separate buttons */
    cursor: pointer; /* Add a pointer cursor on hover */
    border-radius: 5px; /* Add rounded corners */
    font-size: 16px; /* Increase font size */
}

/* Change button color on hover */
.f1:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
    

    <h2>Retrieve Appointment & Payment Data</h2>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <button type="submit">Retrieve Appointment & Payment Data</button>
    </form>
    <button class="f1" onclick="window.location.href = 'home page.html';">Home Page</button>
</body>
</html>
