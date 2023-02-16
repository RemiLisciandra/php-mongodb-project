<!DOCTYPE html>
<html>
<head>
	<title>Liste des Tweets</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
		<h1>Liste des Tweets</h1>
        <br>
        <br>
		<?php

			require 'vendor/autoload.php';

			use MongoDB\Client;

			$client = new Client("mongodb://localhost:27017");
			$userCollection = $client->twitter->user;
			$tweetCollection = $client->twitter->tweet;

			$users = $userCollection->find();

			foreach ($users as $user) {
				echo '<h2>'.$user["name"].'</h2>';
				echo '<table class="table table-striped">';
				echo '<thead><tr><th>Les tweets :</th></tr></thead>';
				echo '<tbody>';
                echo '<br>';

				$tweets = $tweetCollection->find(['user_id' => $user['_id']]);

				foreach ($tweets as $tweet) {
					echo '<tr><td>'.$tweet['content'].'</td><td>';
				}

				echo '</tbody>';
				echo '</table>';
			}

		?>
	</div>
</body>
</html>
