<?php

include('../vendor/autoload.php');

$client = new Predis\Client();

$user = [
	'name'          => 'John Doe',
	'phone'         => '971 11 22 33',
	'pages_visited' => 5,
];


# Guarda toda una estructura de datos como clave
$client->hmset('user:123', $user);
# Guarda un valor adicional en la clave user_123
$client->hset('user:123', 'street', 'C\\ Mayor 11');

# Recibe toda la información de user_123 en forma de array asociativo
$user = $client->hgetall('user:123');
var_dump($user);


# Incrementa en 5 el valor de las páginas visitadas
$client->hincrby('user:123', 'pages_visited', 5);
echo $client->hget('user:123', 'pages_visited') . PHP_EOL;