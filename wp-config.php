<?php
// Connection to Database
$hostname = "localhost";
$userName = "id19820304_root";
$password = "f9%+%f~)\d[c3UA|";
$dbName = "id19820304_junior_dev_test_task";

$connection = new mysqli($hostname, $userName, $password, $dbName);
if ($connection->connect_error) {
    die("Connection failed due to this error : " . $connection->connect_error . '<br>');}

