<link rel="stylesheet" type="text/css" href="../CSS/Navbar-style.css" media="screen" />

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="Index.php">Quality Education</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">Courses</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Partners</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Login <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                       <li class="px-3 py-2">
                           <form class="form-login" role="form" method="POST" action="../../Controller/Controller-User.php">
                           <input type="hidden" name="action_form" value="login" style="display:none;"/>
                                <div class="form-group">
                                    <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text" name="loginEmail" required>
                                </div>
                                <div class="form-group">
                                    <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="password" required name="loginPass">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-secundary btn-block"><a href="/View/Register.php">Register</a></button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>






