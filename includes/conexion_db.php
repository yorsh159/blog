<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'blog';

$conexion = mysqli_connect($hostname, $username, $password, $database);

mysqli_query($conexion, "SET NAMES 'utf8'");

session_start();
