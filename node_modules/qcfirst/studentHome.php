<?php
include("menuHeaderS.php");
session_start();
//$user = $_SESSION["userEmail"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Home Page</title>
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/qcfirst/myStyle.css">
    <link rel="stylesheet" href="node_modules/qcfirst/studentHome.css">
</head>

<body>
<div class="header-ctnr">
    <h1>CUNYFIRST</h1>
</div>
<?php
//echo "<script>console.log('.$user.');</script>";
?>
<h2>Student</h2>
<div class="container" onclick="">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
</div>
<div id="body">
    <h3>My Schedule:</h3>
    <div id="sHome-table">
        <table id="homeTable">
            <tr>
                <th>Course</th>
                <th>Day</th>
                <th>Time</th>
            </tr>
            <tbody id="student-table-body">

            </tbody>
            </tr>
        </table>
    </div>
</div>
<div class="btn">
    <form action="node_modules/qcfirst/enrollmentPage.php" method="get">
        <input class="btn2" type="submit" value="Course Enrollment">
    </form>
</div>
</body>

</html>
<script src="node_modules/qcfirst/index.js"></script>
<?php
include_once("footer.php");
?>
