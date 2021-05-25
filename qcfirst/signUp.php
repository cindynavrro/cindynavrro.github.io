<?php
include("server.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <title>Sign up Page</title>
    <link rel="stylesheet" href="signUpStyle.css">
</head>
<body>
<div>
<div class="header-ctnr">
    <h1>CUNYFirst<h1>
</div>
<form class="main-form" action="signUp.inc.php" method="post" id="registerForm">
    <div class="container">
        <div class="signUp-container">
            <h2>SIGN UP</h2>
            <?php
             if(isset($_GET["error"])){
                 if($_GET['error'] == "none"){
                     echo "<p id='insert'>Success!</p>";
                 }else if($_GET['error'] == "reconfirm"){
                     echo "<p id='insert'>Passwords dont match</p>";
                 }else if($_GET['error'] == "invalidEmail"){
                     echo "<p id='insert'>Email Taken</p>";
                 }
             }
            ?>
        </div>
        <p>Please provide the following information. </p>

        <label class="label" for="fName"><b>First Name</b></label>
        <input class="input-field" id="fName" type="text" placeholder="Enter First Name" name="firstName" required>

        <label class="label" for="lName"><b>Last Name</b></label>
        <input class="input-field" id="lName"type="text" placeholder="Enter Last Name" name="lastName" required>


        <label class="label" for="email"><b>Email</b></label>
        <input class="input-field" id="email" type="email" placeholder="Enter Email" name="email" required>


        <label class="label" for="password"><b>Password</b></label>
        <input class="input-field" id="password" type="password" placeholder="Enter Password" name="password" required>

        <label class="label"  for="confirmPassword"><b>Repeat Password</b></label>
        <input class="input-field" type="password" placeholder="Confirm Password" name="confirmPassword" required>

        <br>
        <div class="rmb-me">
            <label>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
        </div>
        <br>
        <div class="stud-prof">
            <label for="choice">I am:</label>
            <select name="userType" id="choice">
                <option value="Student">Student</option>
                <option value="Professor">Professor</option>
                <option value="Admin">Admin</option>
            </select>
        </div>

        <div class="btns">
            <input  class="submit-btn" type="submit" value="Sign Up" id="submit" name="submit">
            <button onclick="location.href='logIn.php'" class="cancel-btn">Return Home</button>
        </div>
    </div>
</form>
</body>
</html>
<?php
include_once ("footer.php")
?>
