<?php
session_start();

$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "tinywarrio7";
$dbName = "qcfirst";

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    if(!$conn){
     die("Connection failed: " . mysqli_connect_error());
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $passwordConfirm = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
        $userType = mysqli_real_escape_string($conn, $_POST['userType']);

        $query = "INSERT INTO userInfo (email, fName, lName, password, userType) VALUES ('$email', '$firstname', '$lastname', '$password', $userType);";
        if(mysqli_query($conn, $query) == true){
            echo '<script>alert("Registration successful!")</script>';
        }
    }

