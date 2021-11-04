<?php

session_start();

include("../Model/Model-User.php");


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
    $login_email = filter_input(INPUT_POST, "loginEmail", FILTER_SANITIZE_EMAIL);
    $login_pass = filter_input(INPUT_POST, "loginPass");
    $rank = 1;
    $action_form = filter_input(INPUT_POST, "action_form");
    
    $button_click = filter_input(INPUT_POST, "button");

    $full_adress = $adress . ", " . $city . ", " . $state . ", " . $country;

    function convertDate($dt){
        $day = substr($dt, 0, 2);
        $month = substr($dt, 3, 2);
        $year = substr($dt, 6, 4);
        $dt = $year . "-" . $month . "-" . $day;
        return $dt;
    }

    $converted_date = convertDate($birth);

    if ($action_form == 'register') { //register
        if ($pass1 === $pass2) {

            $return_insert = insertUser($cpf, $name, $date, $email, $telephone, $pass1, $rank, $full_adress);

            if ($return_insert === true) {
                echo "<script language ='javascript' type='text/javascript'> alert('Success! Use your login data to access.'); window.location.href='/View/Index.php' </script>";
            } else {
                echo "<script language ='javascript' type='text/javascript'> alert('Error! User already exist!'); window.location.href='/View/Register.php' </script>";
            }
        } else {
            echo "<script language ='javascript' type='text/javascript'> alert('Ops! As senhas informadas são diferentes.'); window.location.href='/View/Register.php' </script>";
        }
    } 
        
    else { //login
        $return_login = loginUser($login_email, $login_pass);

        if ($return_login != false) {
            $_SESSION['s_idUser'] = $return_login['idUser'];
            $_SESSION['s_name'] = $return_login['Name'];
            $_SESSION['s_date'] = $return_login['Birth'];
            $_SESSION['s_email'] = $return_login['Email'];
            $_SESSION['s_telephone'] = $return_login['Telephone'];
            $_SESSION['s_pass'] = $return_login['Password'];
            $_SESSION['s_rank'] = $return_login['Rank'];
            $_SESSION['s_full_adress'] = $return_login['Adress'];

            if ($_SESSION['s_rank'] == 1)
                echo "<script type='text/javascript'>alert('Login sucess! Wellcome');window.location.href = '../View/Home-User.php';</script>";

            else {
                echo "<script type='text/javascript'>alert('Login sucess');window.location.href = '../View/Home-Adm.php';</script>";
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Login fail.');window.location.href ='../View/Register.php';</script>";
        }

    }

    if($button_click === 'checked'){
        
        session_destroy(); 
        

        
    }


}



?>