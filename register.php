<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'buy_sell_db');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    // SQL query to insert user data into the database
    $sql = "INSERT INTO users (name, email, password, gender, contact) VALUES ('$name', '$email', '$password', '$gender', '$contact')";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Form submitted successfully!");';
        echo 'window.location.href = "http://localhost/buy_sell/login.php";</script>';
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
    <title>Register - BookSwapzzz</title>
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
        .form-section, .info-section {
            padding: 40px;
            width: 50%;
        }
        .form-section {
            background-color: #fff;
        }
        .info-section {
            background-color: #00bfa5;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
        .form-section .radio-group {
            margin-bottom: 20px;
        }
        .form-section .radio-group input[type="radio"] {
            margin-right: 5px;
        }
        .form-section .radio-group label {
            margin-right: 15px;
        }
        .form-section .get-started-button {
            width: 100%;
            padding: 10px;
            background-color: #00bfa5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-section .login-link {
            display: block;
            margin-top: 10px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
        .form-section .login-link:hover {
            text-decoration: underline;
        }
        .info-section h2 {
            font-size: 35px;
            margin-bottom: 20px;
            font-family:Verdana, Geneva, Tahoma, sans-serif
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
            <h1>Create an account</h1>
            <form method="POST" action="">
                <div class="input-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="radio-group">
                    <label for="gender">Gender</label>
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female" required>
                    <label for="female">Female</label>
                    <input type="radio" id="other" name="gender" value="other" required>
                    <label for="other">Other</label>
                </div>
                <div class="input-group">
                    <label for="contact">Contact Number</label>
                    <input type="tel" id="contact" name="contact" pattern="[0-9]{10}" required>
                </div>
                <button class="get-started-button" type="submit">Get Started</button>
            </form>
            <a href="login.php" class="login-link">Already have an account? Log In</a>
        </div>
        <div class="info-section">
            <h2>BookLyst</h2>
            <p>Experience seamless and convenient book trading with BookLyst.</p>
        </div>
    </div>
</body>
</html>
