<?php

//parse cli args to get superglobal (for testing)
// parse_str(implode('&', array_slice($argv, 1)), $_GET);

//get the id of the current square
$id = $_GET['id'];

//update the square 
require('connection.php');
$db = new PDO($connstr);
$stmt = $db->prepare("update grid set status = 2 where ogc_fid = ?;");
$stmt->execute([$id]);

//return the 
$result->rows = $stmt->rowCount();
echo json_encode($result);