<?php

require_once ("Model-DataBase.php");

    //Insert Bootcamp
    function insertBootcamp($idBootcamp, $name){

        include ("Model-DataBase.php");

        $query = "INSERT INTO bootcamp (idBootcamp, Name) VALUES ('$idBootcamp', '$name');";

        $command = mysqli_query($conn, $query);
        
        return $command;
        
    }

    //Delete Bootcamp;
    function deleteBootcamp($idBootcamp){

        include ("Model-DataBase.php");

        $query = "DELETE FROM bootcamp WHERE idBootcamp = '$idBootcamp';";

        $command = mysqli_query($conn, $query);

        return $command;
        
    }

    //edit Bootcamp
    function editBootcamp($idBootcamp, $name){

        include ("Model-DataBase.php");

        $query = "UPDATE bootcamp, 
            set idBootcamp = '$idBootcamp', name ='$name'
            WHERE idCourse = '$idBootcamp';
        ";

        $command = mysqli_query($conn, $query);
        
        return $command;

    }
?>