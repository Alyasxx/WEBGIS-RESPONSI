<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CHICKEN'S MAP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <!-- Marker Cluster -->
  <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.css" />
  <link rel="stylesheet" href="assets/plugins/leaflet-markercluster/MarkerCluster.Default.css" />
  <!-- Routing -->
  <link rel="stylesheet" href="assets/plugins/leaflet-routing/leaflet-routing-machine.css" />
  <!-- Search CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-search/leaflet-search.css" />
  <!-- Geolocation CSS Library for Plugin -->
  <link rel="stylesheet"
    href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css" />
  <!-- Leaflet Mouse Position CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.css" />
  <!-- Leaflet Measure CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-measure/leaflet-measure.css" />
  <!-- EasyPrint CSS Library -->
  <link rel="stylesheet" href="assets/plugins/leaflet-easyprint/easyPrint.css" />
  <style>
    body {
      padding-top: 70px;
      /* Sesuaikan dengan tinggi navbar Anda */
    }

    .content {
      margin-top: 70px;
      /* Sesuaikan dengan tinggi navbar Anda */
      padding-bottom: 20px;
      /* Atur padding di bagian bawah jika diperlukan */
    }

    #map {
      height: 97.5vh;
    }

    .info {
      padding: 6px 8px;
      font: 14px/16px Arial, Helvetica, sans-serif;
      background: white;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
      text-align: center;
    }

    .info h2 {
      margin: 0 0 5px;
      color: #777;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><span class="text-warning">Ternak</span>Sleman</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Maps
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="titik_ternak.php">Peta Sebaran Titik</a></li>
              <li><a class="dropdown-item" href="peta_domba.html">Peta Peternakan Domba</a></li>
              <li><a class="dropdown-item" href="peta_itik.html">Peta Peternakan Itik</a></li>
              <li><a class="dropdown-item" href="peta_ayam.html">Peta Peternakan Ayam</a></li>
            </ul>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  $nama = $_POST["Nama"];
  $jenis_peternakan = $_POST["Jenis_Peternakan"];
  $longitude = $_POST["Longitude"];
  $latitude = $_POST["Latitude"];

  // Sesuaikan dengan setting MySQL
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pgweb_acr8";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Hindari SQL Injection dengan menggunakan prepared statement
  $sql = "INSERT INTO ternak_sleman (Nama, Jenis_Peternakan, Longitude, Latitude) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);

  // Bind parameter
  $stmt->bind_param("ssdd", $nama, $jenis_peternakan, $longitude, $latitude);

  if ($stmt->execute()) {
    echo "New record created successfully. Thanks for your participation. Enjoy your new journey being happily farmer!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- footer -->
  <footer class="bg-dark p-2 text-center">
    <div class="container">
      <p class="text-light">Alya Syahidha &copy; 2023 - WEBGIS | RESPONSE</p>
    </div>
  </footer>
  </script>
</body>
</html>