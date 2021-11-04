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
        <div id="courses" style="height:200px;">
            <h3>My Courses</h3>
        </div>
        <hr>
        <div id="certificates" style="height:200px">
            <h3>My Certificates</h3>
        </div>
        <hr>
        <div id="bootcamps" style="height:200px">
            <h3>My Bootcamps</h3>
        </div>

        <hr>
    </div>
    
    <?php include("../View/Helpers/Footer.php") ?>

</body>

</html>