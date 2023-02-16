<?php

require 'vendor/autoload.php';

use MongoDB\Client;
use Faker\Factory;

$faker = Factory::create();
$client = new Client("mongodb://localhost:27017");
$userCollection = $client->twitter->user;
$tweetCollection = $client->twitter->tweet;

// Obtenir tous les utilisateurs de la collection user
$users = $userCollection->find();

foreach ($users as $user) {
    // Créer un certain nombre de tweets pour chaque utilisateur
    $numberOfTweets = rand(1, 10);
    for ($i = 0; $i < $numberOfTweets; $i++) {
        $tweet = [
            'content' => $faker->text(140),
            'created_at' => $faker->dateTimeThisYear,
            'user_id' => $user['_id']
        ];

        $tweetCollection->insertOne($tweet);
    }
}

echo "Les tweets sont créés aléatoirement pour chaque utilisateurs.\n";
?>
