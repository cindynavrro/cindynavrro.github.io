<?php
include ("menuHeaderS.php");
session_start();
$user = $_SESSION["userEmail"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Page</title>
    <meta name="viewport" content="width = device-width, initial scale= 1">
    <link rel="stylesheet" href="myStyle.css">
    <link rel="stylesheet" href="enrollmentPage.css">
</head>
<body>

<div class="header-ctnr">
    <h1>CUNYFirst</h1>
</div>
<?php
echo "<script>console.log('.$user.');</script>";
echo $user;
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
    <table id="body">
        <div class="title-row">
            <tr>
                <th>My Shopping Cart</th>
                <th>Day/Time</th>
                <th colspan="2">Instructor</th>
            </tr>
        </div>
        <tr>
            <td>CS355</td>
            <td>M/W 12:00pm-1:15pm</td>
            <td>Dave Schoul</td>
            <th>
                <label class="checkbox-cntr">
                    <input type="checkbox">
                    <span class="newBox"></span>
                </label>
            </th>
        </tr>
        <tr>
            <td>CS331</td>
            <td>T/TH 12:00pm-1:15pm</td>
            <td>Jessy Jones</td>
            <th>
                <label class="checkbox-cntr">
                    <input type="checkbox">
                    <span class="newBox"></span>
                </label>
            </th>
        </tr>
        <tr>
            <td>CS3205</td>
            <td>F 12:00pm-3:00pm</td>
            <td>Nancy Carter</td>
            <th>
                <label class="checkbox-cntr">
                    <input type="checkbox">
                    <span class="newBox"></span>
                </label>
            </th>
        </tr>
        <tr>
            <td>CS313</td>
            <td>M/W 1:00pm-2:15pm</td>
            <td>Jerry Tombsome</td>
            <th>
                <label class="checkbox-cntr">
                    <input type="checkbox">
                    <span class="newBox"></span>
                </label>
            </th>
        </tr>
    </table>
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
<?php
include("footer.php");
?>
