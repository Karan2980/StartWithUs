<?php

// $conn = mysqli_connect("localhost","root","","reglog1");

$email = $_POST['email'];
$password = $_POST['password'];
//database connection
$conn = new mysqli("localhost", "root", "", "reglog");
if ($conn->connect_error) {
    die("Failed to connect: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("select * from tb_user where email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        
        if ($data['password'] == $password) {
            echo '<script>alert("Login successfully"); window.location.href = "home page.html";</script>';
        } else {
            echo "<h2>Invalid Email or Password</h2>";
            echo "wromg";
        }
    } else {
        echo "<h2>Invalid Email or Password</h2>";
    }
}

?>