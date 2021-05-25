<?php
include_once ("login.inc.php");

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "tinywarrio7";
$dbName = "qcfirst";

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if(isset($_POST["retrieve"])) {
    $email = $_POST["email"];
    if ($conn->connect_error) {
        die('Could not connect to the database.');
    } else {
        forgotPassword($conn, $email);
    }
}

