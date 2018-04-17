<?php

include('../vendor/autoload.php');

$client = new Predis\Client();
$client->set('user:2:surname', 'Doe');
if ($client->exists('user:2:surname')) {
	echo 'Surname is ' . $client->get('user:2:surname') . PHP_EOL;
} else {
	echo 'Surname is not defined' . PHP_EOL;
}

$client->del(['user:2:surname']);

if ($client->exists('user:2:surname')) {
	echo 'Surname is ' . $client->get('user:2:surname') . PHP_EOL;
} else {
	echo 'Surname is not defined' . PHP_EOL;
}