<?php 
    require ("../config.php");
    $conn = new mysqli("localhost", "root", "", $databaseName);
    $conn->set_charset('utf8');
    if(!$conn){
        echo $conn->error();

    }
?>