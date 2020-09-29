<?php

// parse cli args to get superglobal (for testing)
// parse_str(implode('&', array_slice($argv, 1)), $_GET);

// get the id of the current square and current user
$id = $_GET['id'];
$uuid = $_GET['uuid'];

// connect to the database
require('connection.php');
$db = new PDO($connstr);

// log the user
$stmt = $db->prepare("insert into users(uuid) values (?);");
$stmt->execute([$uuid]);

// update the grid square
$stmt = $db->prepare("update grid set status = 1 where ogc_fid = ?;");
$stmt->execute([$id]);

// return the row count
$result->rows = $stmt->rowCount();
echo json_encode($result);
