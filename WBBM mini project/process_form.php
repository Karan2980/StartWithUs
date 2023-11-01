<?php
error_reporting(E_ALL);


$host = "localhost";
$username = "root";
$password = "";
$database = "reglog";

$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input (type and satisfaction)
$consultantType = $_GET["type"];
// $satisfaction = $_GET["satisfaction"];

// Validate and sanitize input (you should add more validation as needed)
$consultantType = htmlspecialchars($consultantType);
$satisfaction = intval($satisfaction);

// Create a SQL query to retrieve data from the database
$sql = "SELECT * FROM consultant1 WHERE type = '$consultantType' OR satisfaction >= '$satisfaction'";

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Output the data
    
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["Name"] . "<br>";
        echo "Type: " . $row["type"] . "<br>";
        echo "Satisfaction: " . $row["satisfaction"] . "<br>";
        echo "Work Experinece: " . $row["Work"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No matching records found.";
}

// Close the database connection
$conn->close();
?>
