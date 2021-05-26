
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <link rel="stylesheet" href="node_modules/qcfirst/forgotPsw.css">
</head>

<body>
<div class="header-ctnr">
    <h1>CUNYFirst<h1>
</div>
<div class="container">
    <div class="alert">
        <?php
        if(isset($_GET["error"])){
            if($_GET['error'] == "DNE"){
                echo"<p>Email does not exist.</p>";
            }
        }
        ?>
    </div>
</div>
<form class="main" action="node_modules/qcfirst/forgotPsw.ini.php" method="POST">
    <div class="container">
        <input type="email" placeholder="email" name="email">
    </div>
    <div class="container">
        <button type="submit" class="btn" name="retrieve">Retrieve Password</button>
    </div>
</form>
</body>
</html>
<?php
include("footer.php");
?>
