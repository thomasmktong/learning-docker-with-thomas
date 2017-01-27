<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$dbuser = getenv('MYSQL_USER');
$dbpass = getenv('MYSQL_PASSWORD');
$schema = getenv('MYSQL_DATABASE');
$db = new mysqli('example_app_db', $dbuser, $dbpass, $schema);

$message = '';
$count = 0;

if($_REQUEST['feed']) {
    $sql = 'UPDATE Feed SET counter = counter + 1;';
    $db->query($sql);
    $sql = 'SELECT message FROM Messages ORDER BY RAND() LIMIT 1;';
    if($result = $db->query($sql)){
        if($row = $result->fetch_assoc()) {
            $message = $row['message'];
        }
        $result->free();
    }
}

$sql = 'SELECT counter FROM Feed;';
if($result = $db->query($sql)){
    if($row = $result->fetch_assoc()) {
        $count = $row['counter'];
    }
    $result->free();
}

$db->close();
?>

  <!doctype html>
  <html>

  <head>
    <title>Moby Dock is Hungry</title>
    <link rel="stylesheet" type="text/css" href="static/main.css">
  </head>

  <body>
    <main class="container">
      <h3><i><?= $message ?></i></h3>
      <img src="static/docker-logo.png" width="459" height="261" alt="Docker logo" />

      <a class="btn" href="index.php?feed=1">Feed Moby Dock</a>

      <p>Moby Dock has been fed
        <?= $count ?> times</p>
    </main>

  </body>

  </html>