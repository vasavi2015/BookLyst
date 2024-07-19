<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'buy_sell_db');

$sql = "SELECT items.Book_ID, items.Title, items.Author, items.Publishing_Year, items.Book_Condition, items.Price, users.name AS seller, users.contact
        FROM items
        JOIN users ON items.seller_id = users.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookLyst - View Books</title>
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
        .header {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 35px;
            font-weight: 700;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #008080;
        }
        .container {
            margin-top: 0px; /* Adjusted margin for better visibility */
            background-color: #fff;
            padding: 20px;
            padding-top: 10px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 1100px; /* Adjusted max-width for better visibility */
            width: 100%;
            position: relative;
            overflow-x: auto; /* Added for horizontal scrolling if needed */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .buy-button {
            display: inline-block;
            padding: 5px 10px;
            background-color: #00bfa5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .buy-button:hover {
            background-color: #008f7a;
        }

        .add-button {
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
        .add-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="header">BookLyst</div>
    <div class="container">
        <h3>Buy Books: </h3>
    <a href="http://localhost/buy_sell/add_item.php" class="add-button">Add Book</a>
        <table>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publishing Year</th>
                <th>Book Condition</th>
                <th>Price</th>
                <th>Seller</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Title'] . "</td>";
                    echo "<td>" . $row['Author'] . "</td>";
                    echo "<td>" . $row['Publishing_Year'] . "</td>";
                    echo "<td>" . $row['Book_Condition'] . "</td>";
                    echo "<td>$" . $row['Price'] . "</td>";
                    echo "<td>" . $row['seller'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td><a href='buy_item.php?id=" . $row['Book_ID'] . "' class='buy-button'>Buy</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No books found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
