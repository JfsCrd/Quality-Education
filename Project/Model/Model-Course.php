<?php

use FFI\ParserException;

require_once ("Model-DataBase.php");

    //Insert course
    function insertCourse($idCourse, $name, $link, $details, $company){

        include ("Model-DataBase.php");

        $query = "INSERT INTO course (idCourse, Name, Link, Details, SupportingCompany_idSupportingCompany)
        VALUES ('$idCourse', '$name', '$link', '$details', '$company');";

        $command = mysqli_query($conn, $query);
        
        return $command;
        
    }

    //Delete course
    function deleteCourse($idCourse){

        include ("Model-DataBase.php");

        $query = "DELETE FROM course WHERE idCourse = '$idCourse';";

        $command = mysqli_query($conn, $query);

        return $command;
        
    }

    //edit course
    function editCourse($id, $name, $details, $company, $link){

        include ("Model-DataBase.php");

        $query = "UPDATE course 
            set idCourse = '$id', name ='$name', link = '$link', SupportingCompany_idSupportingCompany = '$company', Details = '$details'
            WHERE idCourse = '$id';
        ";

        $command = mysqli_query($conn, $query);
        
        return $command;

    }
?>