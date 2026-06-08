<?php
# Inicializar una nueva sesión de curl
const Api_Url = 'https://whenisthenextmcufilm.com/api';
$ch = curl_init(Api_Url);

//  Recibir el estado de la petición y no mostrarlo en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar la petición 
y guardamos el resultado*/
$resultApi = curl_exec($ch);

# Una alternativa es utilizar file_get_contents
// $resultApi = file_get_contents(Api_Url);  // Si solo quieres hacer un GET de una API
$data = json_decode($resultApi, true);

# Cerrar conexión por si acaso
curl_close($ch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La proxima pelicula de marvel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<body>

<main>
    <section>
        <img src="<?= $data['poster_url'] ?>" alt="Poster Pelicula">
    </section>
    <hgroup>
        <h3><?= $data['title']; ?> se estrena en <?= $data['days_until']; ?> días</h3>
        <p>Fecha de estreno: <?= $data['release_date']; ?></p>
        <p>La siguiente pelicula es: <?= $data['following_production']['title']; ?></p>
    </hgroup>
</main>
    
</body>
</html>

<style>
    :root {
        color-scheme: dark;
    }
    body {
        display: grid;
        place-content: center;

        pre {
            font-size: 0.5rem;
            overflow-y: scroll;
            overflow-x:unset;
            max-width: 70vh;
        }

        section img {
            width: 50vh;
            height: 70vh;
            display: flex;
            justify-self: center;
            align-self: center;
            border-radius: 20px;
        }
    }
</style>