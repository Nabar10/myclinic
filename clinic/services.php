<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blossom Women's Clinic</title>
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poetsen+One&display=swap">

  <style>
    /* Adjustments size */
    .service-card {
      min-height: 250px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .service-description {
      overflow: hidden;
      white-space: nowrap;
      text-overflow: ellipsis;
      max-width: 100%;
    }

    .service-description::after {
      content: "...";
    }

    .modal-content {
      max-width: 600px;
      margin: 20px auto;
    }

    .modal-image {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
    }

    /* Small screens */
    @media screen and (max-width: 1024px) {
      .w3-third {
        width: 50% !important;
      }
    }

    @media screen and (max-width: 600px) {
      .w3-third {
        width: 100% !important;
      }

      .modal-content {
        max-width: 90%;
      }
    }
  </style>
</head>

<body>
  <header class="w3-container w3-center w3-padding" style="background-color: #FFB6C1;">
    <h2 style="font-family: 'Poetsen One';">Blossom Women's Clinic</h2>
    <p>Where Health Blooms, Families Flourish</p>
  </header>
  <!-- Navbar -->
  <div class="topnav" id="myTopnav">
    <a href="homepage.php">Home</a>
    <a href="services.php" class="active">Services</a>
    <a href="#Appointment">Appointment</a>
    <a href="logout.php">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <div style="min-height:100vh;overflow-y: auto;">
    <div class="w3-container w3-padding">
      <div class="w3-row-padding">
        <?php
        // PHP code to fetch and display services
        include 'dbconnect.php';

        $sql = "SELECT * FROM tbl_services";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($services as $service) {
          $serviceId = $service['service_id'];
          $serviceName = $service['service_name'];
          $serviceDescription = implode(' ', array_slice(explode(' ', $service['service_description']), 0, 3));
          $servicePrice = number_format($service['service_price'], 2);

          echo '<div class="w3-third w3-margin-bottom w3-margin-top">';
          echo '<div class="w3-card w3-hover-shadow w3-margin-bottom service-card">';
          echo '<img src="assets/service_' . $serviceId . '.jpg" class="w3-image">';
          echo '<div class="w3-container w3-center">';
          echo '<h3>' . $serviceName . '</h3>';
          echo '<p class="w3-small">' . $serviceDescription . '...</p>';
          echo '<button onclick="document.getElementById(\'id' . $serviceId . '\').style.display=\'block\'" class="w3-button w3-blue w3-margin">View Details</button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';

          // Dynamic modal windows
          echo "<div id='id$serviceId' class='w3-modal'>";
          echo "<div class='w3-modal-content w3-animate-opacity modal-content'>";
          echo "<header class='w3-container w3-grey'>";
          echo "<span onclick=\"document.getElementById('id$serviceId').style.display='none'\" class='w3-button w3-display-topright'>&times;</span>";
          echo "<h3 class='w3-center'>$serviceName</h3>";
          echo "</header>";
          echo "<div class='w3-container'>";
          echo "<img src='assets/service_$serviceId.jpg' onerror=\"this.onerror=null;this.src='assets/service.png'\" class='modal-image'>";
          echo "<h4>Service Details</h4>";
          echo "<p><strong> $serviceName </strong></p>";
          echo "<p><b>Service Description:</b> {$service['service_description']}</p>";
          echo "<p><b>Service Price:</b> RM $servicePrice</p>";
          echo "<p>Service available for any queries. Contact us to make an appointment.</p>";
          echo "</div>";
          echo "<footer class='w3-container w3-grey w3-padding'>";
          echo "<button class='w3-button w3-blue w3-right' onclick=\"document.getElementById('id$serviceId').style.display='none'\">Close</button>";
          echo "</footer>";
          echo "</div>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>
  <footer class="w3-container w3-center" style="font-family: 'Oswald'; background-color:#FFB6C1;">
    <p>Blossom Women's Clinic&copy</p>
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