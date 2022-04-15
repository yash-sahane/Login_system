<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'usersall';

$con = mysqli_connect($servername, $username, $password, $database);
if ($con) {
} else {
    die('Error : ' . mysqli_connect_error());
}