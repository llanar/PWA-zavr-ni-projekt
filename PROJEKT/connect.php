<?php

header('Content-Type: text/html; charset=utf-8');

mysqli_report(MYSQLI_REPORT_OFF);

$servername = "localhost";
$username = "root";
$password = "";
$basename = "projekt";

$dbc = @mysqli_connect(
    $servername,
    $username,
    $password,
    $basename
);

if($dbc){
    mysqli_set_charset($dbc, "utf8");
}