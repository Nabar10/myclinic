<?php
if (isset($_POST["email"]) && isset($_POST['password'])) {
    include 'dbconnect.php';
    $email = $_POST['email'];
    $pass = sha1($_POST['password']);

    $sqllogin = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass'";
    $stmt = $conn->prepare($sqllogin);
    $stmt->execute();
    $number_of_rows = $stmt->fetchColumn();
    if ($number_of_rows > 0) {
        session_start();
        $_SESSION["email"] = $email;
        echo "<script>alert('Login Success')</script>";
        echo "<script>window.location.href = 'homepage.php'</script>";
    } else {
        echo "<script>alert('Login Failed')</script>";
        echo "<script>window.location.href = 'login.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poetsen+One&display=swap">
    <script src="scripts/login.js"></script>
    <title>Clinic</title>
    <style>
        /* Adjustments for small screens */
        @media (max-width: 600px) {
            .hide-on-small {
                display: none;
            }

        }
    </style>
</head>

<body onload="loadCookies()">
    <header>
        <h2 style="font-family: 'Poetsen One'; text-align: center; margin-top: 10px;">Blossom Women's Clinic</h2>
        <p style="text-align: center;">Where Health Blooms, Families Flourish</p>
    </header>

    <div style="min-height:100vh;overflow-y: auto;">
        <section class="w3-container w3-display-container" style="height:100vh; background-image: url('image/pink.jpg');">
            <div class="w3-display-middle" style="width:90%; max-width:600px;">
                <div class="w3-row">
                    <div class="w3-half hide-on-small" style="overflow: hidden; position: relative;">
                        <img src="image/4.jpg" alt="Sample image" style="width: 100%; height: 100%; max-height: 395px;"> <!-- Adjust max-height as needed -->
                    </div>

                    <div class="w3-half">
                        <form class="w3-container w3-card-4 w3-padding-16 w3-white" name="loginForm" action="login.php" method="POST">
                            <div class="w3-section w3-center">
                                <p class="w3-xlarge">Login</p>
                            </div>
                            <!-- Email input -->
                            <div class="w3-section">
                                <label>Email address</label>
                                <input class="w3-input w3-border w3-round" name="email" type="email" id="idemail" placeholder="Enter email address" required>
                            </div>

                            <!-- Password input -->
                            <div class="w3-section">
                                <label>Password</label>
                                <input class="w3-input w3-border w3-round" name="password" type="password" id="idpass" placeholder="Enter password" required>
                            </div>

                            <div class="w3-section">
                                <label class="w3-check">
                                    <input type="checkbox" name="remember" id="idremember" onclick="rememberMe()"> Remember me
                                </label>
                            </div>

                            <div class="w3-section w3-center">
                                <button class="w3-button w3-blue w3-round" type="submit">Login</button>
                                <p class="w3-small">Don't have an account? <a href="register.php" class="w3-text-red">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="w3-container w3-center" style="font-family: 'Oswald';">
        <p>Copyright Blossom Women's Clinic&copy;</p>
    </footer>
</body>
<script>
    let cookie_consent = getCookie("user_cookie_consent");
    if (cookie_consent != "") {
        document.getElementById("cookieNotice").style.display = "none";
    } else {
        document.getElementById("cookieNotice").style.display = "block";
    }

    function deleteCookie(cname) {
        const d = new Date();
        d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=;" + expires + ";path=/";
    }

    function acceptCookieConsent() {
        deleteCookie('user_cookie_consent');
        setCookies('user_cookie_consent', 1, 30);
        document.getElementById("cookieNotice").style.display = "none";
    }
</script>

</html>