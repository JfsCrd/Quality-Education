<script src="/Controller/Helpers/Logout.js"></script>
<?php include("../View/Helpers/Header.php");?>

<link rel="stylesheet" type="text/css" href="/View/CSS/Navbar-style.css" media="screen" />

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">Quality Education</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="#courses" class="nav-link">Courses Availables</a></li>
                <li class="nav-item"><a href="#bootcamps" class="nav-link">Bootscamps</a></li>
                <li class="nav-item"><a href="#students" class="nav-link">Students</a></li>
            </ul>
            <ul class="nav navbar-nav flex-row left-content-between ml-auto mr-2">
                <li class="nav-item order- order-md-1">
                    Olá, <?php echo $_SESSION['s_name']; ?>
                </li>
            </ul>

            <ul class="nav navbar-nav flex-row justify-content-between ml-0 mr-0">
                <li class="nav-item order-2 order-md-1">
                    <class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a>
                </li>
                <li>
                    <button type="button" id="btnLogout" name="logout" class="btn btn-outline-secondary btn-sm" onclick="fun()"><span class="caret">Logout</span></button>
                </li>
            </ul>
        </div>
    </div>
</nav>

