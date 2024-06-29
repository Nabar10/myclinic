<?php
session_start();

if (isset($_POST["submit"])) {
    include('dbconnect.php');

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = sha1($_POST['password']);
    $phoneno = $_POST["phoneno"];
    $address = $_POST["address"];

$checkEmailQuery = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($checkEmailQuery);
$stmt->execute([$email]);
$existingUser = $stmt->fetch();

if ($existingUser) {
    echo "<script>alert('Email already in use. Please choose a different email.')</script>";
} else {
    $sqlregpatient = "INSERT INTO `users`(`name`, `email`, `password`, `phone_number`, `address`) 
                  VALUES (?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sqlregpatient);
        $stmt->execute([$name, $email, $pass, $phoneno, $address]);

        echo "<script>
            alert('Account successfully created');
            window.location.href = 'login.php';
          </script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Error creating account: " . $e->getMessage() . "')</script>";
    }
} 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poetsen+One&display=swap">
    <title>New Register</title>
</head>
<style>
    body {
            background: url('image/pink.jpg') no-repeat fixed;
            background-size: cover;
        }

</style>    
<body>
<header class="w3-container w3-center w3-white">
        <h2 style="font-family: 'Poetsen One'; text-align: center; margin-top: 10px;">Blossom Women's Clinic</h2>
        <p style="text-align: center;">Where Health Blooms, Families Flourish</p>
    </header>
    <div style="min-height:100vh;overflow-y: auto;">
        <div class="w3-container">
            <div class="w3-container w3-card w3-white" style="max-width:700px;margin:auto;margin-top:10vh;margin-bottom:10vh;">
                <form class="w3-container w3-padding w3-margin" action="register.php"
                    method="POST">
                    <h3 class="w3-center">Register New Account</h3>
                    <label>Name</label>
                    <input class="w3-input w3-border w3-round" type="text" name="name" placeholder="Name"
                        required><br>
                    <label>Email</label>
                    <input class="w3-input w3-border w3-round" type="email" name="email" placeholder="Email"
                        required><br>
                    <label>Password</label>
                    <input class="w3-input w3-border w3-round" type="password" name="password" placeholder="Password"
                        required><br>    
                    <label>Phone Number</label>
                    <input class="w3-input w3-border w3-round" type="text" name="phoneno" placeholder="Phone Number"
                        required><br>
                    <label>Address</label>
                    <textarea class="w3-input w3-border w3-round" name="address" placeholder="Address" rows="5"
                        required></textarea>
                    <br>
                    <div class="w3-center">
                        <input class="w3-button w3-round w3-blue" type="submit" name="submit" value="Submit">
                        <a href="login.php" class="w3-button w3-round w3-blue">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <footer class="w3-container w3-center w3-white" style="font-family: 'Oswald';">
        <p>Copyright Blossom Women's Clinic&copy;</p>
    </footer>
</body>

</html>
