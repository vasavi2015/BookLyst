<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'buy_sell_db');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publishing_year = $_POST['publishing_year'];
    $Book_Condition = $_POST['Book_Condition'];
    $price = $_POST['price'];
    $seller_id = $_SESSION['user_id'];

    // SQL query to insert book data into the database
    $sql = "INSERT INTO items (Title, Author, Publishing_Year, Book_Condition, Price, seller_id) 
            VALUES ('$title', '$author', '$publishing_year', '$Book_Condition', '$price', '$seller_id')";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Display a JavaScript alert after successful book addition
        echo "<script>alert('Book added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - BookSwapz</title>
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            position: relative;
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .input-group input, .input-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-group textarea {
            resize: vertical;
        }
        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #00bfa5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-button:hover {
            background-color: #008f7a;
        }
        .view-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }
        .view-button:hover {
            background-color: #0056b3;
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
        <a href="http://localhost/buy_sell/view_items.php" class="view-button">View Books</a>
        <h1>Add Book</h1>
        <form method="POST" action="">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="input-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" required>
            </div>
            <div class="input-group">
                <label for="publishing_year">Publishing Year</label>
                <input type="number" id="publishing_year" name="publishing_year" required>
            </div>
            <div class="input-group">
                <label for="Book_Condition">Book Condition</label>
                <input type="text" id="Book_Condition" name="Book_Condition" required>
            </div>
            <div class="input-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
            <button type="submit" class="submit-button">Add Book</button>
        </form>
    </div>
</body>
</html>