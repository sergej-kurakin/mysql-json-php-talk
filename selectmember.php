<?php

require_once __DIR__.'/config.php';

$mysqli = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWD, MYSQL_DATABASE);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."\n\n";
    exit(1);
}

$SQL = 'SELECT `id`, `data`, `data`->>\'$.param\' AS param, `data`->>\'$.param.title\' AS title FROM jsontest WHERE id = 4';

echo $SQL."\n";

$res = $mysqli->query($SQL);

$obj = $res->fetch_object();

$res->free();

var_dump($obj->id);
var_dump($obj->data);
var_dump($obj->param);
var_dump($obj->title);
