<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de cURL; ch = cURL handle
    $ch = curl_init(API_URL);
    // Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    //Desactivar protocolos SSL de Curl (No hacer en producción)
    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);


    /* 
        Ejecutar la petición  
        y guardamos el resultado
    */

    $result = curl_exec($ch);
    $data = json_decode($result, true);

    curl_close($ch);
?>

<head>
<meta charset="UTF-8">
<title>La próxima pelicula de Marvel</title>
<meta name="description" content="La próxima película de Marvel">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
/>

</head>


<main>
<section>
    <img 
    src="<?= $data["poster_url"]; ?>" width="300" alt="Poster de <?= $data["title"];?>"
    style="border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.5);"
    />

    <hgroup>
        <h2>
            <?= $data["title"]; ?>
        </h2>
        <h3>
            Se estrena en <?= $data["days_until"]; ?> días
        </h3>
        <p>
            Fecha de estreno: <?= $data["release_date"]; ?>
        </p>
        <p>
            La siguiente es: <?= $data["following_production"]["title"]; ?>
        </p>
    </hgroup>
</section>

</main>

<style>
:root {
    color-scheme: light dark;
}

body{
    display: grid;
    place-content: center;
}

section {
    display: flex;
    justify-content: center;
}

hgroup {
    margin-left: 1rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
}

img {
    margin: 0 auto;
    display: block;
}
</style>