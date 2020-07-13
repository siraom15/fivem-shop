<?php 
    require ('function.php');
    session_start();
    echo getPlayerWebMoney($_SESSION['steamid64']);
?>