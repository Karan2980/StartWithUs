<?php
session_start();
$conn = mysqli_connect("localhost","root","","reglog");
$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if(!empty($username)){
if (!empty($password)) {
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
        $sql = "INsert Into tb_user (username, email, password)
        value('$username', '$email', '$password')";
        if ($conn->query($sql)) {
            echo '<script>alert("Register successful"); window.location.href = "index.html";</script>';
        } else {
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