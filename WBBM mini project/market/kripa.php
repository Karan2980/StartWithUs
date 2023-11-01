<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-color: #B6FFFA;
        }
        .s {
            margin: 10px;
            margin-top: 10px;
            padding: auto;
        }
        .all {
            background-color: #80B3FF;
            width: 500px;
            height: 1250px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }
        label {
            display: inline-block;
            width: 100px;
            text-align: left;
        }
        input[type=text], input[type=amount] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }
        input[type=consultant] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .f1 {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 20px;
        }
        .f1:hover {
            background-color: #45a049;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
    <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "reglog");
    $name = $email = $transaction_id = "";
    $amount = 3500; // constant value
    $consultant = 'kripa'; // constant value
    $consultant_email = 'kripa@gmail.com';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $transaction_id = filter_input(INPUT_POST, 'transaction_id');
        if (!empty($amount) && !empty($transaction_id)) {
            $sql = "INSERT INTO payment (name, email, amount, consultant, consultant_email, transaction_id)
            VALUES ('$name', '$email', '$amount', '$consultant', '$consultant_email', '$transaction_id')";
            
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Payment successful and appointment booked"); window.location.href = "../home page.html";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Name, Email, and Transaction ID are required fields.";
        }
    }
    ?>
    <form method="post" action="">
        <div class="all">
            <div class="s">
                <h2>Payment</h2>
                <label for="Name">Name  </label>
                <input type="text" name="name" id="name" required value="<?php echo $name; ?>"><br><br>
                <label for="email">Email  </label>
                <input type="text" name="email" id="email" required value="<?php echo $email; ?>"><br><br>
                <!-- <label for="Number">Amount  </label>
                <input type="amount" name="amount" id="amount" required value="<?php echo $amount; ?>"><br><br>
                consultant name
                <label for="consultant">Consultant  </label><br>
                <input type="consultant" name="consultant" id="consultant" required value="<?php echo $consultant; ?>" width="100px"><br><br> -->
                <p>Amount : <b>3500 R.S.</b> </p>

                <label for="transaction_id">Transaction ID </label><br>
                <input type="text" name="transaction_id" id="transaction_id" required value="<?php echo $transaction_id; ?>"><br><br>
                <p>Scan the below code for payment</p>
                <img src="../payment.jpg" alt="QR code" width="300">
                <p>Or you can pay by number or UPI ID given below</p>
                Phone : <b>1234567890</b><br>
                UPI ID : <b>startwithus@upi</b>
            </div>
            <div class="input-field">
                <a href="https://rzp.io/i/mexDmes" target="_blank" class="active">(Pay by card or any other option)</a><br><br>
                <h2>First payment then fill the data by clicking above payment option</h2>
                <input type="submit" class="f1" value="submit">
                <button class="f1" onclick="window.location.href = '../home page.html';">Back</button>
            </div>
        </div>
    </form>
</body>
</html>
