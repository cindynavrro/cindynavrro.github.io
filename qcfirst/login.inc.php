<?php
if(isset($_POST["submit"])){
    $email =$_POST["email"];
    $psw = $_POST["psw"];
   // $userType = $_POST["userType"];

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "tinywarrior7";
    $dbName = "qcfirst";

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die('Could not connect to the database.');
    } else {
        $SELECT = "SELECT email FROM userInfo WHERE email = (?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($resultEmail);
        $stmt->store_result();
        $stmt->fetch();
        $rowNum = $stmt->num_rows;

        if ($rowNum == 0) {
            //if email not in db
            header("location: logIn.php?error=emailDNE");
        }else{
            //if email is already in db - check if password is correct
            $SELECT = "SELECT password FROM userInfo WHERE email = (?) AND password = (?)";
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("ss", $email,$psw);
            $stmt->execute();
            $stmt->bind_result($resultUser);
            $stmt->store_result();
            $stmt->fetch();
            $rowNum = $stmt->num_rows;

            //if password is incorrect
            if ($rowNum == 0) {
                header("location: logIn.php?error=incorrectPsw");

            //password & email both correct
            }else{
                //Check account type for successful logins
                $SELECT = "SELECT userType FROM userInfo WHERE email = (?) AND password = (?)";
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("ss", $email,$psw);
                $stmt->execute();
                $stmt->bind_result($resultAccountType);
                $stmt->store_result();
                $stmt->fetch();
                $rowNum = $stmt->num_rows;

                //Redirect according to user type
                if($resultAccountType == 'Student'){
                    //Student Acct
                    session_start();
                    $userID = getUserID($conn, $email);
                    $_SESSION["userId"] = $userID;
                    $_SESSION["userEmail"] = $email;

                    header("location: studentHome.php");
                }else if ($resultAccountType == 'Professor'){
                    //Professor Acct
                    session_start();
                    $userID = getUserID($conn, $email);
                    $_SESSION["userId"] = $userID;
                    $_SESSION["userEmail"] = $email;
                    header("location: instructorHome.php");
                }else if ($resultAccountType == 'Admin'){
                    session_start();
                    $userID = getUserID($conn, $email);
                    $_SESSION["userId"] = $userID;
                    $_SESSION["userEmail"] = $email;
                    header("location: adminHome.html");
                }
            }
        }
    }
}

function getUserID($conn, $email): string
{
    $resultID = "";
    $SELECT = "SELECT userID FROM userInfo WHERE email = (?);";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($resultID);
    $stmt->store_result();
    $stmt->fetch();

    return $resultID;
}

function getUserFirst($conn, $email): string
{
    $resultFirst = "";
    $SELECT = "SELECT fName FROM userInfo WHERE email = (?);";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($resultFirst);
    $stmt->store_result();
    $stmt->fetch();

    return $resultFirst;
}

function getUserLast($conn, $email): string
{
    $resultLast = "";
    $SELECT = "SELECT lName FROM userInfo WHERE email = (?);";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($resultLast);
    $stmt->store_result();
    $stmt->fetch();

    return $resultLast;
}

function forgotPassword($conn, $email) {
    $resultPass = "";
    $SELECT = "SELECT password FROM userInfo WHERE email = (?);";
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($resultPass);
    $stmt->store_result();
    $stmt->fetch();
    $rowNum = $stmt->num_rows;

    if($rowNum == 0) {
        header("location: forgotPsw.php?error=DNE");
    }else{
        echo '<script type="text/javascript">alert("Password: ' . $resultPass . '");</script>';
    }
}

