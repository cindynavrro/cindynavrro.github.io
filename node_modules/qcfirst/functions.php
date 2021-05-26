<?php
session_start();
function pswMatch($psw, $pswConfirm): bool
{
    $result = null;
    if($psw == $pswConfirm){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function createUser($conn, $email, $fName, $lName, $psw) {
    $sql = "INSERT INTO userInfo values (email, fName, lName, password, userType) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: signUp.php=stmtfailed");
        exit();
    }

    $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $email, $fName, $lName, $hashedPsw, $userType);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: signUp.php?error=none");
    exit();
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM userInfo WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo '<script>alert("Error!")</script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);

    $resultData = mysqli_stmt_getresult($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
          return $row;
    }else{
        return false;
    }

    mysqli_stmt_close($stmt);

}