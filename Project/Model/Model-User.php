<?php

    require_once ("Model-DataBase.php");

        
    function insertUser ($cpf, $name, $date, $email, $telephone, $pass, $rank, $full_adress){ //Insert user
        include ("Model-DataBase.php");

        $sql = "INSERT INTO user (idUser, Name, Birth, Email, Telephone, Password, Rank, Adress)
        VALUES ('$cpf', '$name', '$date', '$email', '$telephone', '$pass', $rank, '$full_adress');";

        $command = mysqli_query($conn, $sql);

        return $command;

    }

        
    function deleteUser($idUser){ //Delete user

        include ("Model-DataBase.php");

        $query = "DELETE FROM User WHERE idUser = '$idUser';";
        $command = mysqli_query($conn, $query);

        return $command;
        
    }


    function loginUser($email, $pass){ //login

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

    function editUser($idUser, $rank){ //edit user

        include ("Model-DataBase.php");

        $query = "UPDATE user set rank = '$rank' WHERE idUser = '$idUser';";

        $command = mysqli_query($conn, $query);

        return $command;

    }

?>
