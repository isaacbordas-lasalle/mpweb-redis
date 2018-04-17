<?php

include('../vendor/autoload.php');

// Ejecuta varias veces el mismo script para ver como se incrementa

$client = new Predis\Client();

echo "Arículo 234=" . $client->incr("article:views:234") . PHP_EOL;
echo "Arículo 789=" . $client->incrby("article:views:789", 5) . PHP_EOL;
