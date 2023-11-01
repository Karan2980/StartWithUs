<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "reglog");
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$amount = filter_input(INPUT_POST, 'amount');
$consultant = filter_input(INPUT_POST, 'consultant');
$transaction_id = filter_input(INPUT_POST, 'transaction_id');

if (empty($amount)) {
    if (empty($transaction_id)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "reglog";
        // Connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        // if (mysqli_connect_error()) {
        //     die('Connect Error (' . mysqli_connect_error() . ') ' . mysqli_connect_error());
        // } else {
        //     $sql = "INSERT INTO payment (name, email, amount, transaction_id)
        //     VALUES ('$name', '$email', '$amount', '$transaction_id')";

        //     if ($conn->query($sql)) {
        //         header('Location: payment.php?success=true');
        //         exit();
        //     } else {
        //         echo "Error: " . $sql . "<br>" . $conn->error;
        //     }

        //     $conn->close();
        // }
    } else {
        echo "Transaction ID should not be empty";
        die();
    }
} else {
    echo "Amount should not be empty";
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment & payment</title>
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
    <h1>Appointment and Payment Confirmation</h1>

    <?php
    if (isset($_GET['success']) && $_GET['success'] === 'true') {
        echo "Payment successful and appointment booked";
    }
    ?>

    <h2>Payment History</h2>
    <table border="1">
        <tr>
        <th>Sr. No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Amount</th>
            <th>Consultant</th>
            <th>Transaction ID</th>
        </tr>
        <?php
        // Retrieve payment data from the database and display it in the table
        $sql = "SELECT name, email, amount, consultant, transaction_id FROM payment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
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
                $rowNum++; // Increment the row number
            }
        } else {
            echo "<tr><td colspan='5'>No payment records found</td></tr>";
        }
        ?>
    </table>
    <button class="f1" onclick="window.location.href = 'index.html';">Log out</button>


</body>
</html>