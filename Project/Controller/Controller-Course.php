<?php

session_start();

include_once("../Model/Model-Course.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = filter_input(INPUT_POST, "txtId", FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, "txtName", FILTER_SANITIZE_STRING);
    $details = filter_input(INPUT_POST, "txtDetails", FILTER_SANITIZE_STRING);
    $company = filter_input(INPUT_POST, "txtCompany", FILTER_SANITIZE_NUMBER_INT);
    $link = filter_input(INPUT_POST, "txtLink", FILTER_SANITIZE_STRING);
    $action_form = filter_input(INPUT_POST, "action_form");

    if($action_form==="edit"){

        $return_edit = editCourse($id, $name, $details, $company, $link);

        if ($return_edit !=false) {
            echo "<script language ='javascript' type='text/javascript'> alert('Success! Course altered.'); window.location.href='../View/Home-Adm.php' </script>";
        } 
        else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! Course not altered!'); window.location.href='/View/Register.php' </script>";
        }
    }

    }