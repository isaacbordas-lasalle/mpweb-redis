<?php

include('../vendor/autoload.php');

$client = new Predis\Client();

# Esta clave se guarda para siempre
$client->set('user:1:name', 'John Doe');
echo $client->get('user:1:name') . PHP_EOL;
$ttl = $client->ttl("user:1:name");
echo "TTL name=" . $ttl . PHP_EOL; // -1, significa que nunca expira
echo PHP_EOL;

# Esta clave se guardará durante un minuto, y le especificamos el UNIX timestamp
$client->set("user:1:surname", "Doe");
$client->expireat("user:1:surname", strtotime("+1 minute"));
$ttl = $client->ttl("user:1:surname");
echo "TTL surname=" . $ttl . PHP_EOL;
echo PHP_EOL;

# Esta clave se guardará durante un minuto, y le especificamos el UNIX timestamp
$client->set("user:1:street", "C\\ Major, 11");
$client->expire("user:1:street", 60);
$ttl = $client->ttl("user:1:street");
echo "TTL street=" . $ttl . PHP_EOL;
echo PHP_EOL;


# Esta clave se guarda 2 segundos
$client->set("user:2:phone", "971 11 22 33");
$client->expireat("user:2:phone", strtotime("+2 seconds"));
$ttl = $client->ttl("user:2:phone");
echo "Phone=" . $client->get('user:2:phone') . PHP_EOL;
echo "TTL phone=" . $ttl . PHP_EOL;
sleep(3);
$ttl = $client->ttl("user:2:phone");
echo "Phone=" . $client->get('user:2:phone') . PHP_EOL; // -2, significa que ya ha expirado
echo "TTL phone=" . $ttl . PHP_EOL;
echo PHP_EOL;
