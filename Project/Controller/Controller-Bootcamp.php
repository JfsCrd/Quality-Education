<?php

session_start();

include_once("../Model/Model-Bootcamp.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = filter_input(INPUT_POST, "txtId", FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, "txtName", FILTER_SANITIZE_STRING);
    $action_form = filter_input(INPUT_POST, "action_form"); 
    //"action_form is" a "hidden" present in the forms to decide which function below should be used

    if($action_form==="edit"){  //call the function editBootcamp of Model-Bootcamp

        $return_edit = editBootcamp($id, $name);

        if ($return_edit !=false) {
            echo "<script language ='javascript' type='text/javascript'> alert('Success! Course altered.'); window.location.href='../View/Home-Adm.php' </script>";
        } 
        else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! Course not altered!'); window.location.href='../View/Home-Adm.php' </script>";
        }
    }

    if($action_form ==="remove"){ //call the function removeBootcamp of Model-Bootcamp

        $return_remove = deleteBootcamp($id); 

        if ($return_remove !=false) {
            echo "<script language ='javascript' type='text/javascript'> alert('Success! Bootcamp deleted.'); window.location.href='../View/Home-Adm.php' </script>";
        } 
        else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! Bootcamp not deleted!'); window.location.href='../View/Home-Adm.php' </script>";
        }
    }

    if($action_form === "insert"){ //call the function insertBootcamp of Model-Bootcamp
        
        $return_insert = insertBootcamp($id, $name);

        if ($return_insert !=false) {
            echo "<script language ='javascript' type='text/javascript'> alert('Success! Bootcamp inserted.'); window.location.href='../View/Home-Adm.php' </script>";
        } 
        else {
            echo "<script language ='javascript' type='text/javascript'> alert('Error! Bootcamp not inserted!'); window.location.href='../View/Home-Adm.php' </script>";
        }

    }

    }