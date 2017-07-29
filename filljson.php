<?php

require_once __DIR__.'/config.php';

$mysqli = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWD, MYSQL_DATABASE);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error."\n\n";
    exit(1);
}


// SHOW VARIABLES LIKE 'max_allowed_packet';

if (!$mysqli->query('UPDATE jsontest SET `data` = \'[]\' WHERE `id` = 1')) {
    echo "Table data resetting failed: (" . $mysqli->errno . ") " . $mysqli->error."\n\n";
    exit(2);
}

$dataSize = 0;
$data = str_repeat('qwertyuiopasdfghjklzxcvbnm', 200);

while (true) {
    if ($mysqli->query('UPDATE jsontest SET `data` = JSON_ARRAY_APPEND(`data`, \'$\', \''.$data.'\') WHERE `id` = 1')) {
        $dataSize += strlen($data);
        echo $dataSize."\n";
    } else {
        echo "Table data resetting failed: (" . $mysqli->errno . ") " . $mysqli->error."\n\n";
        exit(3);
    }
}

