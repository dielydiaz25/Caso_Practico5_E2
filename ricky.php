<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
  <body>
  <a href="index.html" >Regresar</a>
  <br>
  <img src="RyM.png" width="50px" align="left">
    <h2>Datos de los personajes de Ricky y Morty</h2>
    <br>
<?php
$api_url = 'https://rickandmortyapi.com/api/character';

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error al realizar la solicitud: ' . curl_error($ch);
    exit;
}
$data = json_decode($response, true);
curl_close($ch);

if ($data && isset($data['results'])) {
    foreach ($data['results'] as $character) {
        echo 'Nombre: ' . $character['name'] . '<br>';
        echo 'Especie: ' . $character['species'] . '<br>';
        echo 'Género: ' . $character['gender'] . '<br>';
        echo '----------------------------------------<br>';
    }
} else {
    echo 'Error al obtener los datos de la API.';
}
?>
</body>
</html>
