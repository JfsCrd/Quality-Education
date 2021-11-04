<?php

    require_once ("Model-DataBase.php");

    //Insert course
    function insertCourse($idCourse, $name, $link, $detais, $company){

        include ("Model-DataBase.php");


        $sql = "INSERT INTO course (idCourse, Name, Link, details, SupportingCompany_idSupportingCompany)
        VALUES ('$idCourse', '$name', '$link', '$details', $company');";

        $command = mysqli_query($conn, $sql);


        if($command === TRUE){
            echo "<script>console.log('Debug Objects: " . "Course successfully inserted!" . "' );</script>";
            return true;
        }
        else{
            echo "<script>console.log('Debug Objects: " . "Course not entered!" . "' );</script>";
            return false;
        }
    }

    //Delete course
    function deleteCourse($idUCourse){

        include ("Model-DataBase.php");

        $query = "DELETE FROM course WHERE idCourse = '$idCourse';";
        $command = mysqli_query($conn, $query);


        if($command === TRUE){
            echo "<script language ='javascript' type='text/javascript'> alert('Course removed from database!'); window.location.href='' </script>";
            return true;
        }
        else{
            echo "<script language ='javascript' type='text/javascript'> alert('Course not removed from database!'); window.location.href='' </script>";
            return false;
        }
        
    }

    //List Course
    function listCourse(){

        include ("Model-DataBase.php");

        $query = "SELECT * FROM course";

        $command = mysqli_query($conn, $query);

        if($command === TRUE){
            foreach($conn->query($query) as $value){
                array_push($course, $value);
            }
        }
        else{
            echo "<script language ='javascript' type='text/javascript'> alert('Could not find courses'); window.location.href='' </script>";
            return false;
        }

    }

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