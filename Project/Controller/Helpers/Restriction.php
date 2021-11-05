<?php //Validates if the user is logged in, if not, it does not allow entering pages where this file exists
session_start();
if (!isset($_SESSION['s_idUser'])) {
    header("Location: http://localhost/view/index.php");
    exit;
}
?>