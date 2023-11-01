<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "reglog");
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$amount = filter_input(INPUT_POST, 'amount');
$transaction_id = filter_input(INPUT_POST, 'transaction_id');

$host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "reglog";
        // Connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
        //$sql = "INSERT INTO payment (name, email, amount, transaction_id)
        //VALUES ('$name', '$email', '$amount', '$transaction_id')";

//$conn->query($sql)
// header('Location: payment.php?success=true');
//$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
</head>
<body>
    <h1>Payment Confirmation</h1>

    <?php
    if (isset($_GET['success']) && $_GET['success'] === 'true') {
        echo "Payment successful and appointment booked";
    }
    ?>

    <h2>Payment History</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Amount</th>
            <th>Transaction ID</th>
        </tr>
        <?php
        // Retrieve payment data from the database and display it in the table
        $sql = "SELECT name, email, amount, transaction_id FROM payment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['transaction_id'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No payment records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
