<?php

$servername     = 'localhost';
$username       = 'root';
$password       = '';
$database       = 'bukutamu';

$conn           = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error){
    die('Koneksi tidak berhasil :'.$conn->connect_error);
}

?>