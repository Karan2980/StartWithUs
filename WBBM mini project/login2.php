<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="container">
        <div class="box">
            <!-- Login Box -->
            <form method="post" action="" autocomplete="off">
                <div class="box-login" id="login">
                    <div class="top-header">
                        <h3>Hello, Consultant</h3>
                        <small></small>
                    </div>
                    <div class="input-group">
                        <div class="input-field">
                            <input type="text" class="input-box" name="email" id="logEmail" required>
                            <label for="logEmail">Email address</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input-box" name="password" id="password" required>
                            <label for "password">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" class="input-submit" value="Log In">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    // Establish a database connection
    $conn = mysqli_connect("localhost", "root", "", "reglog1");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // PHP Validation and Data Retrieval
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Query to check if the email and password match in the database
            $login_sql = "SELECT * FROM consultant WHERE email = '$email' AND password = '$password'";
            $login_result = mysqli_query($conn, $login_sql);

            if ($login_result && mysqli_num_rows($login_result) > 0) {
                echo "Email and password are correct";
                header("Location: payment_data.php?consultant_email=$email");
                


                // Query to retrieve data from the payment table with matching email
                // $payment_sql = "SELECT * FROM payment WHERE consultant_email = '$email'";
                // $payment_result = mysqli_query($conn, $payment_sql);

                // if ($payment_result && mysqli_num_rows($payment_result) > 0) {
                //     echo "<h2>Payment Data:</h2>";
                //     echo "<ul>";
                //     while ($row = mysqli_fetch_assoc($payment_result)) {
                //         echo "<li>Name: " . $row['name'] . ", Amount: " . $row['amount'] . "</li>";
                //     }
                //     echo "</ul>";
                // } else {
                //     echo "No payment data found for this email.";
                // }
            } else {
                echo "Email or password is incorrect";
            }
        } else {
            echo "Invalid request";
        }
    }
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
