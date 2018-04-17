<?php

include('../vendor/autoload.php');

$client = new Predis\Client();


$client->set('user', 'Alice');
echo $client->get('user') . PHP_EOL;
echo PHP_EOL;


// Un modo para organizar las claves es utilizar cierto prefijo/sufijo
// para cada clave, que desriba lo que hace. Imagina que tu aplicación tiene que guardar el nombre de
// un producto y de un usuario:
$client->set('user:1:name', 'Sponge Bob');
$client->set('product:566:name', 'Sponge Bob');
echo $client->get('user:1:name') . PHP_EOL;

// Es bastante común usar el ID de base de datos (de existir) y ponerlo como parte de la clave, para evitar
// solapamientos en futuros desarrollos