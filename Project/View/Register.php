<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("..\View\Helpers\Header.php") ?>

    <title>Capacita</title>

    <title>Register</title>
</head>

<body class="body">


    <?php include "../View/Helpers/Navbar.php" ?>

    <form action="../Controller/Controller-User.php" method="POST" style="margin: 100px;">

        <input type="hidden" name="action_form" value="register" style="display:none;"/>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" class="form-control" name="txtName" placeholder="Jhon Mitchel" required>
            </div>
            <div class="form-group col-md-4">
                <label>CPF</label>
                <input type="text" class="form-control" name="txtCPF" placeholder="11111111111" required>
            </div>

            <div class="form-group col-md-2">
                <label>Birth</label>
                <input type="date" class="form-control" name="txtBirth" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>E-mail</label>
                <input type="email" class="form-control" name="txtEmail" placeholder="jhon@email.com" required>
            </div>


            <div class="form-group col-md-6">
                <label >Telephone</label>
                <input type="text" class="form-control" name="txtPhone" placeholder="9177790645" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Password</label>
                <input type="password" class="form-control" name="txtPass1" placeholder="password" required>
            </div>
            <div class="form-group col-md-6">
                <label>Repeat Password</label>
                <input type="password" class="form-control" name="txtPass2" placeholder="password" required>
            </div>
        </div>
        </div>

        </div>

        <div class="form-group">
            <label>Adress</label>
            <input type="text" class="form-control" name="txtAdress" placeholder="218 W Centre St, 49" required>
        </div>


        <div class="form-row">

            <div class="form-group col-md-3">
                <label>State</label>
                <select name="txtState" class="form-control" required>
                    <option selected>Choose...</option>
                    <option>...</option>
                    <option>...</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label>Country</label>
                <select name="txtCountry" class="form-control" required>
                    <option selected>Choose...</option>
                    <option>...</option>
                    <option>...</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>City</label>
                <input type="text" class="form-control" name="txtCity" required>
            </div>


        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Register</button>
        <button class="btn"><a href="/View/Index.php" style="color: black;">Cancel</a></button>
    </form>

    <?php include("../View/Helpers/Footer.php") ?>

</body>

</html>