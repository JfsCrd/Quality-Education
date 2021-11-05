<?php

session_start();

include_once("../Model/Model-Matriculation.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $idCourse = $_POST["courseId"];
    $idUser = $_POST["userId"];
    $date = (new DateTime())->getTimestamp();
    $action_form = filter_input(INPUT_POST, "action_form");

    function convertDate($dt){
        $day = substr($dt, 0, 2);
        $month = substr($dt, 3, 2);
        $year = substr($dt, 6, 4);
        $dt = $year . $month . $day;
        return $dt;
    }

    $converted_date = convertDate($date);

    if($action_form === "matriculation"){

        $return_matriculation = insertMatriculation($idCourse, $idUser, $converted_date);

        if ($return_matriculation != false) {
            echo "<script language ='javascript' type='text/javascript'> alert('Success! Matriculate.'); window.location.href='../View/Home-User.php' </script>";
        } 
        else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! Not Matriculate.'); window.location.href='../View/Home-User.php' </script>";
        }
    }

    if($action_form ==="remove"){

        $return_remove = deleteCourse($id);

        if ($return_remove !=false) {
            echo "<script language ='javascript' type='text/javascript'> alert('Success! Course deleted.'); window.location.href='../View/Home-Adm.php' </script>";
        } 
        else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! Course not deleted!'); window.location.href='/View/Register.php' </script>";
        }
    }

    if($action_form === "insert"){

        
        $return_insert = insertCourse($id, $name, $link, $details, $company);

        if ($return_insert !=false) {
            echo "<script language ='javascript' type='text/javascript'> alert('Success! Course inserted.'); window.location.href='../View/Home-Adm.php' </script>";
        } 
        else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! Course not inserted!'); window.location.href='../View/Home-Adm.php' </script>";
        }

    }

    }