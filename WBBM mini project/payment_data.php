<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Data</title>
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
    </style>
</head>
<body>
    <h1>Payment Data</h1>

    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "reglog1");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_GET['consultant_email'])) {
        $email = $_GET['consultant_email'];

        // Query to retrieve payment data with matching email
        $payment_sql = "SELECT * FROM payment WHERE consultant_email = '$email'";
        $payment_result = mysqli_query($conn, $payment_sql);

        if ($payment_result && mysqli_num_rows($payment_result) > 0) {
            echo "<h2>Payment Data:</h2>";
            echo "<table border='1'>";
            echo "<tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Consultant</th>
                    <th>Transaction ID</th>
                </tr>";

            while ($row = mysqli_fetch_assoc($payment_result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['consultant'] . "</td>";
                echo "<td>" . $row['transaction_id'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No payment data found for this email.";
        }
    } else {
        echo "Invalid request";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
