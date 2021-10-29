<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Última versão JavaScript compilada e minificada -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/View/CSS/Body.css" media="screen" />
    <link rel="stylesheet" href="/View/HTML/header.html">

    <title>Entrar</title>
</head>

<body class="body">


    <?php include "../HTML/header.html" ?>

    <div style=" margin-bottom:100px; width: 400px; height: 400px; position: absolute; top:30%; left: 35%; background-color:bisque;">
        <h1 style="padding: 50px 50px 0px;">
            LOGIN
        </h1>
        <form method="post">
            <div style="width: 100%; padding: 50px 50px;">
                <input type="textUser" name="user" placeholder="Usuário" style="width: 100%; " />
                <br />
                <br />
                <input type="password" name="senha" placeholder="Senha" style="width: 100%;" />
                <br />
                <br />

                <div style="float: left; width: 70%; text-align: left; margin-left: -5px; padding-top: 15px;">
                    <button name=" cadastrar" style="border: 0; background-color: rgba(4, 40, 241, 0);"> <a href="Cadastro.php"/>Cadastrar</a></button>
                </div>
                <div style="text-align: right; width: 30%; float: right; margin-right: -5px; padding-top: 15px;">
                    <button name="entrar" style="border: 0; background-color: rgba(0, 0, 0, 0);"><a href="/View/PHP/Home-User.php"> Entrar</a></button>
                </div>
            </div>
        </form>
    </div>


</body>

</html>