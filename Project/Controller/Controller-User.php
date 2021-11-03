<?php

session_start();

include ("../Model/Model-User.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = filter_input(INPUT_POST, "txtName", FILTER_SANITIZE_STRING);
    $birth = filter_input(INPUT_POST, "txtBirth");
    $email = filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL);
    $telephone = filter_input(INPUT_POST, "txtPhone", FILTER_SANITIZE_STRING);
    $pass1 = filter_input(INPUT_POST, "txtPass1", FILTER_SANITIZE_STRING);
    $pass2 = filter_input(INPUT_POST, "txtPass2", FILTER_SANITIZE_STRING);
    $adress = filter_input(INPUT_POST, "txtAdress", FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, "txtCity", FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, "txtState", FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, "txtCountry", FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, "txtCPF", FILTER_SANITIZE_STRING);
    $rank = 1;

    $full_adress = $adress . ", " . $city . ", " . $state . ", " . $country;

    function convertDate($dt){
        $day = substr($dt,0,2);
        $month = substr($dt,3,2);
        $year = substr($dt,6,4);
        $dt = $year."-".$month."-".$day;
        return $dt;
    }

    $converted_date = convertDate($birth);

    if ($pass1 === $pass2) {

        $return_insert = insertUser ($cpf, $name, $date, $email, $telephone, $pass1, $rank, $full_adress);

        if ($return_insert === TRUE) {
            echo "<script language ='javascript' type='text/javascript'> alert('Aoba! Usuário criado com sucesso.'); window.location.href='/View/Home-User.php' </script>";
        } else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! User already exist!'); window.location.href='/View/Register.php' </script>";
        }
    } else {
        echo "<script language ='javascript' type='text/javascript'> alert('Ops! As senhas informadas são diferentes.'); window.location.href='../View/Cadastro.php' </script>";
    }
}

?>