<?php
session_start();
if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    echo "<script>alert('Please Login')</script>";
    echo "<script>window.location.href = 'login.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poetsen+One&display=swap">
    <title>Clinic</title>
    
</head>

<body>
    <header class="w3-container w3-center w3-padding" style="background-color: #FFB6C1;">
        <h2 style="font-family: 'Poetsen One';">Blossom Women's Clinic</h2>
        <p>Where Health Blooms, Families Flourish</p>
    </header>
    <!-- Navbar -->
    <div class="topnav" id="myTopnav">
        <a href="#home" class="active">Home</a>
        <a href="services.php">Services</a>
        <a href="#Appointment">Appointment</a>
        <a href="logout.php">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div style="min-height:100vh;overflow-y: auto;">
    <div class="w3-container w3-row w3-card w3-margin" id="about">
    <h3>About US</h3>
    <div class="w3-container w3-third w3-padding w3-hide-small w3-center">
        <a style="text-decoration: none;" href="#">
            <img src="image/20.jpg" style="height: 100%; max-width: 100%;">
            <button class="w3-button w3-block w3-blue" style="margin-top: 10px;">Learn More</button>
        </a>
    </div>
    <div class="w3-container w3-twothird">
        <p style="text-align: justify;">Welcome to Blossom Women's Clinic, where we prioritize women's and family health with personalized care in a nurturing environment. 
            Our dedicated team offers a range of services tailored to every stage of life, from routine check-ups to specialized treatments.
            At Blossom, we empower women with knowledge to make informed health decisions, ensuring your health journey is supported with compassion and expertise.
            Experience healthcare that nurtures, heals, and blossoms with you. Trust Blossom Women's Clinic for your family's health needs.
        </p>
    </div>
</div>

        <div class="w3-container w3-row w3-card w3-margin" id="services">
            <h3>Services</h3>
            <div class="w3-container w3-twothird">
                <p style="text-align: justify;">At Blossom Women's Clinic, we offer a wide range of services tailored to
                    women's health and family care,
                    including comprehensive prenatal and postnatal services, family planning, pediatric consultations,
                    nutrition and wellness consultations, parenting workshops,
                    and family counseling and mental health counseling. Our dedicated team is committed to providing
                    compassionate and high-quality care to support the health and well-being of women and their
                    families.
                </p>
            </div>
            <div class="w3-container w3-third w3-padding w3-hide-small w3-center">
        <a style="text-decoration: none;" href="services.php">
            <img src="image/21.jpg" style="height: 100%; max-width: 100%;">
            <button class="w3-button w3-block w3-blue" style="margin-top: 10px;">Learn More</button>
        </a>
    </div>
        </div>
        <div id="contactus" class="w3-container w3-row w3-card w3-margin">
            <h3>Contact Us</h3>
            <div class="w3-container w3-half">
                <h4>Our Location</h4>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1254.9149504721404!2d101.4479214631862!3d3.06617157805477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc534c4ffe81cf%3A0xeb61f5772fd54514!2sKlang%2C%20Selangor!5e0!3m2!1sen!2smy!4v1713315619394!5m2!1sen!2smy"
                    width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <h4>Our Address</h4>
                <p>Jalan A, Taman B<br> 47000 Klang<br>Selangor<br>Phone: +6012-3456789</p>
            </div>
            <div class="w3-container w3-half">
                <hr class="w3-hide-large">
                <h4>Contact Form</h4>
                <form>
                    <input class="w3-input w3-border w3-round" type="text" name="name" style="margin-bottom: 5px;"
                        placeholder="Your Name" required>
                    <input class="w3-input w3-border w3-round" type="email" name="email" style="margin-bottom: 5px;"
                        placeholder="Your Email" required>
                    <textarea class="w3-input w3-border" rows="4" name="message" placeholder="Your Message"
                        style="margin-bottom: 5px;"></textarea>
                    <button class="w3-button w3-blue w3-section w3-block w3-round" name="submit" value="submit"
                        type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="w3-container w3-center" style="font-family: 'Oswald'; background-color:#FFB6C1;">
        <p>Blossom Women's Clinic &copy;</p>
    </footer>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

</body>

</html>