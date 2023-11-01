<!DOCTYPE html>
<html>
<head>
    <title>Review Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #B6FFFA;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background-color: #80B3FF;
            color: white;
            padding: 10px;
        }

        form {
            background-color: #ffffff;
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin: 10px 0;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-right: 10px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            background-color: #80B3FF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .f1 {
            background-color: #80B3FF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Write a Review</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required style="margin-right: 10px;"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required style="margin-right: 10px;"><br>

        <label for="rating">Rating:</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required style="margin-right: 10px;"><br>

        <label for="comment">Comment:</label>
        <textarea name="comment" id="comment" required ></textarea><br>
        <button class="f1" onclick="window.location.href = '../home page.html';">Back</button>

        <input type="submit" value="Submit Review">
    </form>
    
    <?php
    // Database connection
    $db = new mysqli('localhost', 'root', '', 'reglog');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];
        
        // Set constant values for consultant name and email
        $consultantName = "abhay";
        $consultantEmail = "abhay@gmail.com";

        // Insert the review into the database
        $query = "INSERT INTO reviews (name, email, rating, comment, consultant_name, consultant_email, created_at) VALUES ('$name', '$email', $rating, '$comment', '$consultantName', '$consultantEmail', NOW())";

        if ($db->query($query) === TRUE) {
            echo '<script>alert("Review submitted successfully."); window.location.href = "review.php";</script>';
        } else {
            echo "Error: " . $query . "<br>" . $db->error;
        }
    }

    $db->close();
    ?>
</body>
</html>
