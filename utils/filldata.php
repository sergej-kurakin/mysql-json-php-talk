<?php

$mysqli = new mysqli("localhost", "jsontest", "jsontest", "mysqljson");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."\n\n";
    exit(1);
}

for ($i = 0; $i < 100000; $i++) {
    $data = [
        'param' => $i,
        'someData' => 'someString_' . $i,
    ];

    $json = json_encode($data);

    $SQL = 'INSERT INTO `jsonindex` (`id`, `data`) VALUES (NULL, \'' . $mysqli->real_escape_string($json) . '\')';

    if (!$mysqli->query($SQL)) {
        echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error."\n\n";
        exit(2);
    }
}

