<?php
session_start();
// Se o usuário não está logado, manda para página de login.
if (!isset($_SESSION['s_idUser'])) {
    header("Location: http://localhost/view/index.php");
    exit;
}
?>