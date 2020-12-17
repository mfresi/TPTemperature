<?php
include("user.php");

$adress = '192.168.64.188';
$port = 1234;

if (isset($_POST['getTemperature']))
{
    $buf = $_POST['getTemperature'];

        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        $result = @socket_connect($socket, $adress, $port);

        @socket_send($socket, $buf, strlen($buf), 0);

        $receiveC = @socket_read($socket, 7, PHP_BINARY_READ);

        $response = "La temperature est de ".$receiveC." °C";

        socket_close($socket);  

        $sql = "INSERT INTO `temperature` VALUES ('',$receiveC,'','')";
        $db->query($sql);

}

if (isset($_POST['getFarenheit']))
{
    
    $buf1 = $_POST['getFarenheit'];

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    $result = @socket_connect($socket, $adress, $port);

    @socket_send($socket, $buf1, strlen($buf1), 0);

    $receiveF = @socket_read($socket, 7, PHP_BINARY_READ);

    $response = "La temperature est de ".$receiveF." F";

    socket_close($socket);  

    $sql = "INSERT INTO `temperature` VALUES ('','',$receiveF,'')";
    $db->query($sql);
}


if (isset($_POST['stopServer']))
{
    
    $buf1 = $_POST['stopServer'];

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

    $result = @socket_connect($socket, $adress, $port);

    @socket_send($socket, $buf1, strlen($buf1), 0);

    $response = @socket_read($socket, 7, PHP_BINARY_READ);

    $response = "Le server est bien ".$response;

    socket_close($socket);  
}

?>
