<?php

require __DIR__ . '/vendor/autoload.php';
require_once 'vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->selectDatabase('twitter');

// Exécution d'une commande de test
$result = $db->command(['ping' => 1]);

// Affichage du résultat de la commande de test
var_dump($result);

?>