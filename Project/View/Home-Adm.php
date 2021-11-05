<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../Controller/Helpers/Restriction.php');?>
    
    <?php
    include("../View/Helpers/Header.php");
    ?>

    <title>Addministrator Board</title>
</head>

<body>

    <?php include("../View/Helpers/Navbar-Adm.php") ?>

    <div style="margin-left: 20px; margin-top:80px">
        <div id="courses">
            <h3>Courses</h3>
        <div style="margin-left:-200px;background-color:floralwhite!important">
            <?php include("../View/Boards/Adm-Course.php"); ?>
            </div>
        </div>

        <hr>

        <div id="bootcamps">
            <h3>Bootcamps</h3>
            <div style="margin-left:-200px;background-color:floralwhite!important">
            <?php include("../View/Boards/Adm-Bootcamp.php"); ?>
            </div>
        </div>

        <hr>

        <div id="users">
            <h3>Users</h3>
        </div>
        <div style="margin-left:-200px;background-color:floralwhite!important">
            <?php include("../View/Boards/Adm-User.php"); ?>
        </div>
        <hr>
    </div>

    <?php include("../View/Helpers/Footer.php") ?>

</body>

</html>