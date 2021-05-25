<?php
include("server.php");
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="logIn.css">
</head>
<body>
    <div class="logo-container">
        <img style="border-radius: 1000px; margin-bottom: 25px"src ="qc-logo.png" alt="QC Logo">
    </div>
    <header>
        <h1>QCFirst</h1>
    </header>
    <div class="box-container">
    <div class="logIn-container">
        <h2>WELCOME!</h2>
        <form action="login.inc.php" method="POST">
            <?php
                if(isset($_GET["error"])) {
                    if ($_GET['error'] == "incorrectPsw") {
                        echo "<script>alert('Err: Passwords do not match.')</script>";
                    }if($_GET['error'] == "emailDNE"){
                        echo "<script>alert('Err: Email does not exist.')</script>";
                    }
                }
            ?>
        <div class="psw-field">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
        </div>
        <div class="usrName-field">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
        </div>
        <div class="logIn-btn">
            <button class="btn" name='submit' type="submit" >SIGN IN</button>
        </div>
        </form>
    </div>
    </div>
    <div class="box">
        <div class="signUp-container">
            <p>New User? <a href="signUp.php">Sign Up</a></p>
        </div>
        <div class="forgotpsw-container">
            <a href="forgotPsw.php">Forgot Password</a>
        </div>
    </div>
</body>
</html>
<?php
include_once ("footer.php");
?>