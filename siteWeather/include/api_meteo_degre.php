<?php

$adress = '192.168.64.188';
$port = 1234;
$buf = "Td";

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

$result = @socket_connect($socket, $adress, $port);

@socket_send($socket, $buf, strlen($buf), 0);

$receiveC = @socket_read($socket, 7, PHP_BINARY_READ);

$response = "La temperature est de " . $receiveC . " °C";

echo json_encode($receiveC);

socket_close($socket);

?>
