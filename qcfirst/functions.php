<?php

function pswMatch($psw, $pswConfirm) {
    $result = null;
    if($psw == $pswConfirm){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createUser($conn, $email, $fName, $lName, $pws) {
    $sql = "INSERT INTO userInfo values (email, fName, lName, password) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmet_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signUp.php=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $email, $fName, $lName, $psw, $userType);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stment_getresult($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
          return $row;
    }else{
        return false;
    }

}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM userInfo WHERE email = ?;";
    $stmt = mysqli_stmet_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signUp.php=emailfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stment_getresult($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
          return $row;
    }else{
        return false;
    }

    mysqli_stmt_close($stmt);

}