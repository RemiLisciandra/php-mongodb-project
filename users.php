<?php

require __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$collection = $client->twitter->user;

$users = $collection->find();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Liste des utilisateurs de Twitter</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container">
    <h2 style="margin-bottom:4%; text-align:center; background-color:#e3f2fd;">Liste des utilisateurs</h2>
        <div class="row">
        <div class="col-md-12 shadow-sm p-3 mb-5 bg-white rounded">
            <table class="table table-striped">
                <thead style="justify-content: center; text-align: center;">
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Pseudo</th>
                        <th>Anniversaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr style="justify-content: center; text-align: center; vertical-align: middle;">
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['birthday'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>     
        </div>
</div>       
</body>
</html>