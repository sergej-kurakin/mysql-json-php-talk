<?php

$mysqli = new mysqli("localhost", "jsontest", "jsontest", "mysqljson");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."\n\n";
    exit(1);
}

$param = random_int(0, 100000);

echo "Searching for $param \n";

$SQL = 'SELECT * FROM jsonindex WHERE g = '.$param;

echo $SQL."\n";

$start = microtime(true);
$res = $mysqli->query($SQL);
$end = microtime(true);

echo round($end-$start, 6)."\n";

$obj = $res->fetch_object();

$res->free();

var_dump($obj->data);
