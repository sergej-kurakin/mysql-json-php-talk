<?php

require_once __DIR__.'/config.php';

$mysqli = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWD, MYSQL_DATABASE);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."\n\n";
    exit(1);
}

$invalidJson = '{"a":dsafasdf';

$SQL = 'INSERT INTO `jsontest` (`id`, `data`) VALUES (3, \'' . $mysqli->real_escape_string($invalidJson) . '\')';

echo "\n".$SQL."\n\n";

if (!$mysqli->query($SQL)) {
    echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error."\n\n";
    exit(2);
}

