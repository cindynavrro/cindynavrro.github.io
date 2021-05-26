<?php
include("menuHeaderS.php");
session_start();
$user = $_SESSION["userEmail"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>CLass List</title>
    <meta name="viewport" content="width = device-width, initial scale=1">
    <link rel="stylesheet" href="node_modules/qcfirst/myStyle.css">
    <link rel="stylesheet" href="node_modules/qcfirst/listDisplay.css">
</head>

<body>
<div class="header-ctnr">
    <h1>CUNYFirst</h1>
</div>
<div>
    <?php
    echo "<script>console.log('.$user.');</script>";
    ?>
    <h2>Student</h2>
</div>
<h3>Class Search</h3>

<div class="searchBtns">
    <form  action="node_modules/qcfirst/enrollmentPage.php">
        <input type="submit" value="New Search">
    </form>
</div>
<div id="classListDisplay-table" style="display: flex; justify-content: center">
    <table>
        <thead>
        <tr class="header-row">
            <th>Class</th>
            <th>Day</td>
            <th>Time</th>
            <th>Instructor</th>
            <th colspan="3">Status</th>
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