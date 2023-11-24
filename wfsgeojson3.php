<?php
 $wfsUrl =
file_get_contents("https://geoportal.slemankab.go.id/geoserver/geonode/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=geonode%3Aa__3404_50KB_AR_JUMLAH_DOMBA_2021&maxFeatures=50&outputFormat=application%2Fjson");

 header('Content-type: application/json');
 echo ($wfsUrl);
 # Jika terdapat &maxFeatures=50 pada url wfs geojson, dihapus supaya jumlah feature tidak dibatasi
 ?>