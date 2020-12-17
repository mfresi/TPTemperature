<?php

$adress = '192.168.64.188';
$port = 1234;
$buf = "Tf";

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

$result = @socket_connect($socket, $adress, $port);

@socket_send($socket, $buf, strlen($buf), 0);

$receiveF = @socket_read($socket, 7, PHP_BINARY_READ);

$response = "La temperature est de " . $receiveF . " °C";

echo json_encode($receiveF);

socket_close($socket);

?>