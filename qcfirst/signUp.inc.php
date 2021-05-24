<?php
if(isset($_POST['submit'])) {
    $email = $_POST["email"];
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $psw = $_POST["password"];
    $pswConfirm = $_POST["confirmPassword"];
    $userType = $_POST["userType"];

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "tinywarrior7";
    $dbName = "qcfirst";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die('Could not connect to the database.');
    }else{
        $SELECT = "SELECT email FROM userInfo WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO userInfo (email, fName, lName, password, userType) VALUES (?,?,?,?,?);";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($resultEmail);
        $stmt->store_result();
        $stmt->fetch();
        $rowNum = $stmt->num_rows;


        if ($rowNum == 0) {
            if (pswMatch($psw, $pswConfirm) == true) {
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssss", $email, $fName, $lName, $psw, $userType);
                if ($stmt->execute()) {
                    echo '<script>alert("Registration successful!")</script>';
                } else {
                    echo $stmt->error;
                }
            } else{
                echo '<script>alert("Err: Passwords do not match.")</script>';

            }
        }
        else {
            echo '<script>alert("Err: Email is already registered.")</script>';

        }
        $stmt->close();
        $conn->close();
    }
}

function pswMatch($psw, $pswConfirm) {
    $result = null;

    if($psw == $pswConfirm){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}