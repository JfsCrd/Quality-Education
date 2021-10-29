<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/View/CSS/Body.css" media="screen" />

    <!-- Última versão CSS compilada e minificada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Última versão JavaScript compilada e minificada -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

    <link rel="stylesheet" href="/View/HTML/header.html">
    <title>Cadastro</title>
</head>

<body class="body">

    <?php include "../HTML/header.html"
    ?>

    <div style="position: relative; height:70px">
        <form method="post" style="padding: 30px;" >
            <input type="text" name="nome" placeholder="Nome Completo" style="width: 100%;"/>
            <br/><br/>
            <input type="text" name="email" placeholder="E-mail" style="width: 100%;"/>
            <br/><br/>
            <input type="text" name="telefone" placeholder="Telefone" style="width: 100%;"/>
            <br/><br/>
            <input type="date" name="date" placeholder="Data de Nascimento" style="width: 100%;"/>
            <br/><br/>
            <input type="text" name="endereço" placeholder="Endereço" style="width: 100%;"/>
            <br/><br/>
            <input type="text" name="cidade" placeholder="Cidade" style="width: 100%;"/>
            <br/><br/>
            <input type="text" name="estado" placeholder="Estado" style="width: 50%;"/>
            <input type="text" name="pais" placeholder="País" style="width: 30%; float: right"/>
            <br/><br/>

            <button name="entrar">Cadastrar</button>

        </form>
    </div>

</body>

</html>