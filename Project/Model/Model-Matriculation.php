<?php

require_once ("Model-DataBase.php");

    //Insert Matriculation
    function insertMatriculation($idCourse, $idUser, $date){

        include ("Model-DataBase.php");

        $query = "INSERT INTO user_has_course (course_idCourse, registration, user_idUser)
        VALUES ('$idCourse', '$date', '$idUser');";

        $command = mysqli_query($conn, $query);
        
        return $command;
        
    }

    //Delete Matriculation
    function removeMatriculation($idCourse, $idUser){

        include ("Model-DataBase.php");

        $query = "DELETE FROM user_has_course WHERE idCourse = '$idCourse' AND idUser = '$idUser';";

        $command = mysqli_query($conn, $query);

        return $command;
        
    }
?>