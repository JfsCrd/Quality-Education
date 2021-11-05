<?php

    require_once ("Model-DataBase.php");

        //Insert user
    function insertUser ($cpf, $name, $date, $email, $telephone, $pass, $rank, $full_adress){

        include ("Model-DataBase.php");


        $sql = "INSERT INTO user (idUser, Name, Birth, Email, Telephone, Password, Rank, Adress)
        VALUES ('$cpf', '$name', '$date', '$email', '$telephone', '$pass', $rank, '$full_adress');";

        $command = mysqli_query($conn, $sql);


        if($command === TRUE){
            echo "<script>console.log('Debug Objects: " . "Insert success!" . "' );</script>";
            return true;
        }
        else{
            echo "<script>console.log('Debug Objects: " . "Insert error!" . "' );</script>";
            return false;
        }
    }

        //Delete user

    function deleteUser($idUser){

        include ("Model-DataBase.php");

        $query = "DELETE FROM User WHERE idUser = '$idUser';";
        $command = mysqli_query($conn, $query);


        if($command === TRUE){
            echo "<script language ='javascript' type='text/javascript'> alert('Sucesso! Usuário removido do banco de dados.'); window.location.href='' </script>";
            return true;
        }
        else{
            echo "<script language ='javascript' type='text/javascript'> alert('Falha! Usuário não removido do banco de dados.'); window.location.href='' </script>";
            return false;
        }
        
    }

        //List User

    function listUser(){

        include ("Model-DataBase.php");

        $query = "SELECT * FROM User";

        $command = mysqli_query($conn, $query);

        if($command === TRUE){
            foreach($conn->query($query) as $value){
                array_push($user, $value);
            }
        }
        else{
            echo "<script language ='javascript' type='text/javascript'> alert('Falha! Não foi possível encontrar usuários'); window.location.href='' </script>";
            return false;
        }

    }

    function loginUser($email, $pass){
        

        include ("Model-DataBase.php");
        
        $query = "SELECT * FROM user WHERE email = '$email' and password = '$pass';";

        $command = mysqli_query($conn, $query);

        $num_rows = mysqli_num_rows($command);

        if($num_rows>= 1){
            $user = mysqli_fetch_assoc($command); //transform dates in arrayss
            return $user; 
        }
        
        else            
            return false;
        

    }

    function editUser($idUser, $rank){

        include ("Model-DataBase.php");

        $query = "UPDATE user set rank = '$rank' WHERE idUser = '$idUser';";

        $command = mysqli_query($conn, $query);

        return $command;

    }

?>
