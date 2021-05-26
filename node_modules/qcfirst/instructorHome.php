<?php
include_once("login.inc.php");
include_once("header.php");
include_once "menuHeaderProf.php";
session_start();
$user = $_SESSION["userEmail"];
echo $user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <Title>Instructor Home</Title>
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/qcfirst/myStyle.css">
    <link rel="stylesheet" href="node_modules/qcfirst/instructorHome.css">
</head>
<body>
<?php
echo "<script>console.log('.$user.');</script>";
?>
 <h2>Instructor:
    <div id="title">
        <h2>My Schedule</h2>
    </div>
<div id="body">

        <table id="instructorScheduleTable">
            <thead>
            <div class="title-row">
                <th>Course</th>
                <th>Days</th>
                <th colspan="2">Time</th>
            </div>
            </thead>
            <tbody id="table-body">

            </tbody>
        </table>
</div>
    <div class="btns">
        <button onclick="myFunction()" id="managebtn">Manage Schedule</button>
    </div>
    <div id="hidden-btns">
        <button class="btn" id="createCourse-btn">Create Course</button>
        <button class="btn" id="deleteCourse-btn">Delete Course</button>
    </div>

    <script type="text/javascript">
document.getElementById("createCourse-btn").onclick= function () {
    location.href = "createCourse.php"
        };
        document.getElementById("deleteCourse-btn").onclick= function () {
            location.href = "deleteCourse.php"
        };
    </script>

</body>
</html>

<script src="node_modules/qcfirst/index.js"></script>
<?php
include("footer.php");
?>
