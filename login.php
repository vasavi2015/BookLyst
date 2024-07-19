<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'buy_sell_db');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to fetch user data based on email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('Location: view_items.php');
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BookSwapzzz</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #ffffff, #00bfa5);
        }
        .container {
            display: flex;
            max-width: 900px;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .form-section {
            padding: 40px;
            width: 50%;
            background-color: #fff;
        }
        .form-section h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .form-section .input-group {
            margin-bottom: 20px;
        }
        .form-section .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-section .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-section .login-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-section .login-button:hover {
            background-color: #0056b3;
        }
        .form-section .register-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
        .form-section .register-link:hover {
            text-decoration: underline;
        }
        .info-section {
            padding: 40px;
            width: 50%;
            background-color: #00bfa5;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .info-section h2 {
            font-size: 35px;
            margin-bottom: 20px;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        .info-section p {
            font-size: 20px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h1>Log In</h1>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-button">Log In</button>
            </form>
            <a href="register.php" class="register-link">Don't have an account? Sign Up</a>
        </div>
        <div class="info-section">
            <h2>BookLyst</h2>
            <p>Experience seamless and convenient book trading with BookLyst.</p>
        </div>
    </div>
</body>
</html>
