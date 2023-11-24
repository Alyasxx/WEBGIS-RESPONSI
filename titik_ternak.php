<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="DIVSIG UGM">
    <meta name="description" content="leaflet basic">

    <!-- Judul pada tab browser -->
    <title>Peta PhpMyAdmin</title>

    <!-- Leaflet CSS Library -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css">

    <!-- Tab browser icon -->
    <link rel="icon" type="image/x-icon" href="http://luk.staff.ugm.ac.id/logo/UGM/Resmi/Warna.gif">

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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <li><a class="dropdown-item" href="peta_domba.html">Peta Peternakan Domba</a></li> 
                  <li><a class="dropdown-item" href="peta_itik.html">Peta Peternakan Itik</a></li>
                  <li><a class="dropdown-item" href="peta_ayam.html">Peta Peternakan Ayam</a></li>
                </ul>
            </ul>
            <form class="d-flex">
        <a class="btn btn-outline-success" href="addpoint.php" role="button">Add Point</a>
      </form>
          </div>
        </div>
      </nav>

    <!-- Leaflet JavaScript Library -->
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
    
    <div id="map"></div>

    <!-- Leaflet and Plugins -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster.js"></script>
    <script src="assets/plugins/leaflet-markercluster/leaflet.markercluster-src.js"></script>
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.js"></script>
    <script src="assets/plugins/leaflet-routing/leaflet-routing-machine.min.js"></script>
    <script src="assets/plugins/leaflet-search/leaflet-search.js"></script>
    <script
        src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
    <script src="assets/plugins/leaflet-mouseposition/L.Control.MousePosition.js"></script>
    <script src="assets/plugins/leaflet-measure/leaflet-measure.js"></script>
    <script src="assets/plugins/leaflet-easyprint/leaflet.easyPrint.js"></script>

    <script>
        /* Initial Map */
        var map = L.map('map').setView([-7.75, 110.3], 12); //lat, long, zoom

        // Title
      var title = new L.Control();
      title.onAdd = function (map) {
        this._div = L.DomUtil.create("div", "info");
        this.update();
        return this._div;
      };
      title.update = function () {
        this._div.innerHTML =
          "<h2>WEBGIS |  PETA SEBARAN TITIK PETERNAKAN KAB. SLEMAN</h2> PEMROGRAMAN SPASIAL : WEB";
      };
      title.addTo(map);

        /* Tile Basemap */
        var basemap1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> | <a href="DIVSIG UGM" target="_blank">DIVSIG UGM</a>' //menambahkan nama//
        });

        var basemap2 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri | <a href="Latihan WebGIS" target="_blank">DIVSIG UGM</a>'
        });

        var basemap3 = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri | <a href="Lathan WebGIS" target="_blank">DIVSIG UGM</a>'
        });

        var basemap4 = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        basemap4.addTo(map);

        // Memanggil data koordinat dari PHP
        var coordinates = <?php
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

        $sql = "SELECT * FROM ternak_sleman";
        $result = $conn->query($sql);

        $coordinates = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $coordinates[] = [
                    'lat' => $row["Latitude"],
                    'lng' => $row["Longitude"],
                    'popup' => $row["Nama"],
                ];
            }
        }

        echo json_encode($coordinates);
        $conn->close();
        ?>;

        // Menambahkan marker ke peta
        coordinates.forEach(function (coordinate) {
            L.marker([coordinate.lat, coordinate.lng]).addTo(map)
                .bindPopup(coordinate.popup);
        });

        /* Control Layer */
        var baseMaps = {
            "OpenStreetMap": basemap1,
            "Esri World Street": basemap2,
            "Esri Imagery": basemap3,
            "Stadia Dark Mode": basemap4
        };

        var overlayMaps = {};

        // Buat grup lapisan
        var coordinateGroup = L.layerGroup();

        // Tambahkan marker ke grup lapisan
        coordinates.forEach(function (coordinate) {
            var marker = L.marker([coordinate.lat, coordinate.lng]).bindPopup(coordinate.popup);
            coordinateGroup.addLayer(marker);
            // Tambahkan marker ke overlayMaps untuk kontrol lapisan
            overlayMaps[coordinate.popup] = marker;
        });

        L.control.layers(baseMaps, overlayMaps).addTo(map);

        // Tambahkan grup lapisan ke peta
        coordinateGroup.addTo(map);

        /* Scale Bar */
        L.control.scale({
            maxWidth: 150,
            position: 'bottomright'
        }).addTo(map);

        // <!-- Watermark -->
      L.Control.Watermark = L.Control.extend({
        onAdd: function (map) {
          var container = L.DomUtil.create("div", "leaflet-control-watermark");
          var img = L.DomUtil.create("img", "watermark-image");
          img.src = "assets/img/logo/SIG.png";
          img.style.width = "100px";
          container.appendChild(img);
          return container;
        },
      });
      L.control.watermark = function (opts) {
        return new L.Control.Watermark(opts);
      };
      L.control.watermark({ position: "bottomleft" }).addTo(map);

      // Legend
      L.Control.Legend = L.Control.extend({
        onAdd: function (map) {
          var img = L.DomUtil.create("img");
          img.src = "assets/img/legend/titik.png";
          img.style.width = "200px";
          img.style.height = "auto";
          return img;
        },
      });
      L.control.Legend = function (opts) {
        return new L.Control.Legend(opts);
      };
      L.control.Legend({ position: "bottomleft" }).addTo(map);
    
        // Plugin Search
        var searchControl = new L.Control.Search({
            position: "topleft",
            layer: wfsgeoserver1, // Nama variabel layer
            propertyName: "Kapanewon", // Field untuk pencarian
            marker: false,
            moveToLocation: function (latlng, title, map) {
                var zoom = map.getBoundsZoom(latlng.layer.getBounds());
                map.setView(latlng, zoom);
            },
        });
        searchControl
            .on("search:locationfound", function (e) {
                e.layer.setStyle({
                    fillColor: "#ffff00",
                    color: "#0000ff",
                });
            })
            .on("search:collapse", function (e) {
                wfsgeoserver1.eachLayer(function (layer) {
                    wfsgeoserver1.resetStyle(layer);
                });
            });
        map.addControl(searchControl);

        // Plugin Geolocation
        var locateControl = L.control
            .locate({
                position: "topleft",
                drawCircle: true,
                follow: true,
                setView: true,
                keepCurrentZoomLevel: false,
                markerStyle: {
                    weight: 1,
                    opacity: 0.8,
                    fillOpacity: 0.8,
                },
                circleStyle: {
                    weight: 1,
                    clickable: false,
                },
                icon: "fas fa-crosshairs",
                metric: true,
                strings: {
                    title: "Click for Your Location",
                    popup: "You're here. Accuracy {distance} {unit}",
                    outsideMapBoundsMsg: "Not available",
                },
                locateOptions: {
                    maxZoom: 16,
                    watch: true,
                    enableHighAccuracy: true,
                    maximumAge: 10000,
                    timeout: 10000,
                },
            })
            .addTo(map);

        // Plugin Mouse Position Coordinate
        L.control
            .mousePosition({
                position: "bottomright",
                separator: ",",
                prefix: "Point Coodinate: ",
            })
            .addTo(map);

        // Plugin Measurement Tool
        var measureControl = new L.Control.Measure({
            position: "topleft",
            primaryLengthUnit: "meters",
            secondaryLengthUnit: "kilometers",
            primaryAreaUnit: "hectares",
            secondaryAreaUnit: "sqmeters",
            activeColor: "#FF0000",
            completedColor: "#00FF00",
        });
        measureControl.addTo(map);

        // Plugin EasyPrint
        L.easyPrint({
            title: "Print",
        }).addTo(map);

         // Plugin Routing
    L.Routing.control({
      waypoints: [
        L.latLng(-7.630510468863392, 110.44307769063943),
        L.latLng(-7.807874025155593, 110.55786189921889),
      ],
      routeWhileDragging: true,
    }).addTo(map);
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <!-- footer -->
    <footer class="bg-dark p-2 text-center">
      <div class="container">
        <p class="text-light">Alya Syahidha &copy; 2023 - Peta Itik</p>
      </div>
     </footer>
    </script>
</body>
</html>