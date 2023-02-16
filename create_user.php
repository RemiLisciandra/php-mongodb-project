<?php

require 'vendor/autoload.php';

use Faker\Factory;
use MongoDB\Client;

$faker = Factory::create();
$client = new Client("mongodb://localhost:27017");
$collection = $client->twitter->user;

for ($i = 0; $i < 100; $i++) {
    $user = [
        'name' => $faker->name,
        'email' => $faker->email,
        'username' => $faker->userName,
        'password' => password_hash($faker->password, PASSWORD_DEFAULT),
        'birthday' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'location' => [
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country
        ]
    ];

    $collection->insertOne($user);
}

echo "Les données sont créées.\n";

?>