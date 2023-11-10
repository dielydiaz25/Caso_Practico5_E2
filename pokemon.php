<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
  <body style="background-color:red">
  <a href="index.html" >Regresar</a>
  <br>
    <img src="pokeapi.png">
    <center>
    <h2>Datos del pokemon</h2>
    <?php
    $pokemon = '28';

    $api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
    curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($api);
    curl_close($api);

    $json = json_decode($response);

    echo '<h4>Habilidades</h4>';
    foreach($json->abilities as $k => $v) {
        echo $v->ability->name.'<br>';
    }

    echo '<h4>Tipo</h4>';
    echo $json->types[0]->type->name;

    echo '<h4>Imagen</h4>';
    echo '<img src="'.$json->sprites->front_default.'" width="200">';
    ?>
    </center>
</body>
</html>