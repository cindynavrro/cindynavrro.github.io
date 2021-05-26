<?php
if(isset($_POST['logout']))
{
    session_destroy();
}
?>
<link rel="stylesheet" href="node_modules/qcfirst/menuButton.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="menuBtns">
    <button class="Homebtn" onclick="location.href='instructorHome.php'"><i class="fa fa-home"></i></button>
    <button class="logoutBtn" name="logout" formmethod="post" onclick="location.href='login.php'""><i class="fa fa-close"></i></button>
</div>

