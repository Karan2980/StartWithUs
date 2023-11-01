<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "karanmailaram29@student.sfit.ac.in";
    $subject = "New Contact Form Submission";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $message = "Name: $name\nEmail: $email\nDescription: $description";

    // Send the email
    if (mail($to, $subject, $message)) {
        header("Location: contact.html");
    } else {
        echo "Email could not be sent. Please try again later.";
    }
    
}
else{
    echo "there will be some error";
}
?>
