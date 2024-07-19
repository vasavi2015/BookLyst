<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'buy_sell_db');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$item_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM items WHERE Book_ID='$item_id'";

if ($conn->query($sql) === TRUE) {
    // Display a JavaScript alert after successful book purchase
    echo "<script>alert('Book purchased successfully!');</script>";
} else {
    echo "Error: " . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Book - BookSwapz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ffffff, #00bfa5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .message {
            font-size: 18px;
            color: #333;
        }
        .home-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #00bfa5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }
        .home-button:hover {
            background-color: #008f7a;
        }

        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 35px;
            font-weight: 700;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #008080;
        }
        
    </style>
</head>
<body>
    <div class="header">BookLyst</div>
    <div class="container">
        <h1>Buy Book</h1>
        <p class="message">
            <?php
            if ($conn->query($sql) === TRUE) {
                echo "Book purchased successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
            ?>
        </p>
        <a href="view_items.php" class="home-button">Go to Home</a>
    </div>
</body>
</html>
