<?php
include ("menuHeaderS.php");
session_start();
//$user = $_SESSION["userEmail"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Page</title>
    <meta name="viewport" content="width = device-width, initial-scale= 1">
    <link rel="stylesheet" href="myStyle.css">
    <link rel="stylesheet" href="enrollmentPage.css">
</head>
<body>

<div class="header-ctnr">
    <h1>CUNYFirst</h1>
</div>
<?php
//echo "<script>console.log('.$user.');</script>";
?>
<h2>Student</h2>
<div class="container" onclick="myFunction(this)">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
</div>
</div>
<div>
    <div class="box-cntr">
        <label for="term">*Term:</label>
        <select name="term" id="term" autofocus>
            <option value="term1">Spring 2021</option>
            <option value="term2">Summer 2021</option>
            <option value="term3">Fall 2021</option>
            <option value="term4">Winter 2021</option>
        </select>
    </div>
    <div class="box-cntr">
        <label for="department">*Department:</label>
        <select name="department" id="department" autofocus>
            <option value="cs">Computer Science</option>
            <option value="math">Mathematics</option>
            <option value="chem">Chemisty</option>
            <option value="bio">Biology</option>
            <option value="history">History</option>
        </select>
    </div>
    <div class="box-cntr">
        <label for="course">Course:</label>
        <input type="text" id="course" name="course">
    </div>
    <div class="box-cntr">
        <button onclick="location.href='classListDisplay.php'" id="enrollSearch">Search</button>
    </div>
    <h3>Ready to Enroll?</h3>
    <div class="contain">
    <table id="shoppingTable">
        <div class="title-row">
            <thead>
            <tr>
                <th>My Shopping Cart</th>
                <th>Day</th>
                <th>Time</th>
                <th colspan="3">Instructor</th>
            </tr>
            </thead>
        </div>
        <tbody id="shop-table-body">

        </tbody>
    </table>
    </div>
    <div class="btns">
        <form  action="">
            <input id="enrollBtn" type="submit" value="Enroll">
        </form>
        <form action="">
            <input id="deleteBtn" type="submit" value="Remove">
        </form>
    </div>
</div>
</body>
</html>
<script src="shoppingIndex.js"></script>
<?php
include("footer.php");
?>
