<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
  <body>
  <a href="index.html" >Regresar</a>
  <br>
    <center>
    <h2>10 imágenes aleatorias de gatos</h2>  
<?php
$api_url = 'https://api.thecatapi.com/v1/images/search?limit=10';

$ch = curl_init($api_url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$data = json_decode($response, true);
curl_close($ch);

if ($data) {
    foreach ($data as $cat) {
        echo '<center><img src="' . $cat['url'] . '" alt="Cat Image", " width="200", </center><br>';
        echo '<br>';
        echo '<br>';
    }
} else {
    echo 'Error al obtener los datos de la API.';
}
?>
</center>
</body>
</html>
