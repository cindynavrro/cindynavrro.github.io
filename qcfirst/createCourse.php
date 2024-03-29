<?php
include("menuHeaderProf.php");
include("login.inc.php");
session_start();
$user = $_SESSION["userEmail"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Title</title>
    <meta name="viewport" content="width = device-width, initial-scale= 1">
    <link rel="stylesheet" href="node_modules/qcfirst/myStyle.css">
    <link rel="stylesheet" href="node_modules/qcfirst/createCourse.css">
</head>
<body>
<div class="header-ctnr">
    <h1>CUNYFirst<h1>
</div>
<?php
echo "<script>console.log('.$user.');</script>";
echo $user;
?>
<h2>Instructor</h2>
<div class="title-box">
    <h4>Enter course information to create:</h4>
</div>
<div class="form-cntr">
    <form action="node_modules/qcfirst/instructorHome.php" method="post">
        <div class="first-box">
            <div class="items">
                <div class="item-label">
                    <label for="term">Select Term:</label>
                    <select class="item-input" name="term" id="term">
                        <option value="2021 Summer">2021 Summer</option>
                        <option value="2021 Fall">2021 Fall</option>
                    </select>
                </div>
                <br>
                <div class="item-label">
                    <label class="item-label"for="department">Select Department:</label>
                    <select class="item-input"name="department" id="department">
                        <option value="art">Art</option>
                        <option value="compSci">Computer Science</option>
                        <option value="math">Mathematics</option>
                        <option value="science">Science</option>
                    </select>
                </div>
                <br>
                <div class="item-label">
                    <label class="item-label" for="course-Name">Enter Course Name:</label>
                    <input class="item-input" type="text" placeholder="Course Name" name="courseName" id="course-Name"required>
                </div>
                <br>
                <label class="item-label" for="courseDescription">Enter Course Description:</label>
                <br>
                <textarea class="item-label" id="courseDescription" name="courseDescription" rows="4" cols="45" ></textarea>
            </div>
        </div>
        <h5>Schedule Selector</h5>
        <div class="box-cntr2">
            <label class="checkbox-cntr" for="beginTime">Begin Time:</label>
            <input class="checkbox-cntr" type="time" id="beginTime" name="beginTime" placeholder="11:30">
        </div>

        <div class="box-cntr2">
            <label for="endTime">End Time:</label>
            <input type="time" id="endTime" name="endTime" placeholder="1:15">
        </div>

        <fieldset id="days">
            <legend>Days</legend>
            <input type="checkbox" class="days" value="Mon" id="mon">
            <label for="mon">Mon</label>

            <input type="checkbox" class="days" value="Tues" id="tues">
            <label for="tues">Tues</label>

            <input type="checkbox"  class="days" value="Wedn" id="wed">
            <label for="wed">Wedn</label>

            <input type="checkbox"  class="days" value="Thurs" id="thurs">
            <label for="thurs">Thurs</label>

            <input type="checkbox"  class="days" value="Fri" id="fri">
            <label for="fri">Fri</label>

            <input type="checkbox" class="days" value="Sat" id="sat">
            <label for="sat">Sat</label>
        </fieldset>

        <div style="margin-top: 8px;" class="box-cntr2">
            <br>
            <label for="courseCap">Course Capacity</label>
            <input type="number" name="capacity" placeholder="30" id="courseCap" step="5" required>
            <br>
        </div>


    </form>
</div>
<div class="btn-box">
    <form action="node_modules/qcfirst/instructorHome.php" method="post" id="add-course-btn">
        <input class="btn"type="submit" value="Create Course">
    </form>
</div>
</body>
<link rel="stylesheet" href="node_modules/qcfirst/footer.css">
</html>

<script src="node_modules/qcfirst/index.js"></script>
<?php
include_once("footer.php");
?>

