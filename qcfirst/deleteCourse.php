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
    <meta name="viewport" content="width = device-width, initial-scale=1">
    <link rel="stylesheet" href="node_modules/qcfirst/myStyle.css">
    <link rel="stylesheet" href="node_modules/qcfirst/deleteCourse.css">
</head>
<body>
<div class="header-ctnr">
    <h1>CUNYFirst</h1>
</div>
<?php
echo "<script>console.log('.$user.');</script>";
echo $user;
?>
<h2>Instructor</h2>
<div class="title">
    <h2>My Schedule</h2>
</div>
<div id="cntr" style="display: flex; justify-content: center">
    <table>
        <tr class="header-row">
            <th>Course</th>
            <th>Day</th>
            <th colspan="2">Time</th>
        </tr>
        </thead>
        <tbody id="table-body">

        </tbody>
    </table>
</div>
</body>
</html>

<script src="node_modules/qcfirst/index.js"></script>
<?php
include("footer.php");
?>