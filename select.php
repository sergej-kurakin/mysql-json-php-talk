<?php

$mysqli = new mysqli("localhost", "jsontest", "jsontest", "mysqljson");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."\n\n";
    exit(1);
}

$res = $mysqli->query('SELECT * FROM jsontest WHERE id = 2');

$obj = $res->fetch_object();

$res->free();

var_dump($obj->data);
