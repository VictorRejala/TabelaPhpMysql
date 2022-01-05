<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "clientes";

$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$conn) {

    die("Houve um erro: " .mysqli_connect_error());
}