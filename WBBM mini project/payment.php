<?php
session_start();
$conn = mysqli_connect("localhost","root","","reglog");
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');
$amount = filter_input(INPUT_POST, 'amount');
$consultant = filter_input(INPUT_POST, 'consultant');
$transaction_id = filter_input(INPUT_POST, 'transaction_id');
if(!empty($amount)){
if (!empty($transaction_id)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "reglog";
    //connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_error().') '
        .mysqli_connect_error());
    }
    else{
        $sql = "insert Into payment (name, email, amount, consultant, transaction_id)
        value('$name', '$email', '$amount','$consultant','$transaction_id')";
        if($conn->query($sql)){
//             echo '<script type="text/javascript">
//        window.onload = function () { alert("Successful Payment"); } 
// </script>';
// Need to add prompt whenever successful payment occur
echo '<script>alert("Payment successful and appointment booked"); window.location.href = "home page.html";</script>';


        }
        else{
            echo "Error: ".$sql ."<br>".$conn->error;
        }
        $conn->close();
    }
}
else{
    echo "Password should not be empty";
    die();
}
}
else{
    echo "Username should not be empty";
    die();
}
?>