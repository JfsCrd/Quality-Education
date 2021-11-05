<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once('../Controller/Helpers/Restriction.php');?>
    
    <?php session_start();
    include("../View/Helpers/Header.php");
    ?>

    <title>Student Board</title>
</head>

<body>

    <?php include("../View/Helpers/Navbar-User.php") ?>

    <div style="margin-left: 20px; margin-top: 80px;">
        <div id="courses">
            <h3>Courses</h3>
            <div style="margin-left:-200px;background-color:floralwhite!important">
            <?php include("../View/Boards/User-Course.php"); ?>
            </div>
        </div>
        <hr>
        <div id="mycourses">
            <h3>My Courses</h3>
            <div style="margin-left:-200px;background-color:floralwhite!important">
            <?php include("../View/Boards/User-MyCourse.php"); ?>
            </div>
        </div>
        <hr>
        <hr>
        <div id="bootcamps">
            <h3>My Bootcamps</h3>
        </div>
        <hr>
        <div id="matriculation">
            <h3>My Certificates</h3>
        </div>
        <hr>
        
    </div>
    
    <?php include("../View/Helpers/Footer.php") ?>

</body>

</html>