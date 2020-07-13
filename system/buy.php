<?php 
    session_start();
    require ('function.php');
    if(isset($_POST['items_name'])){
        $itemName = $_POST['items_name'];
        // check player have enough money
        $status = buyItem($_SESSION['steamid64'], $itemName, getWebItemPrice($itemName));
        if($status==1){
            echo "1";
        }else{
            echo "0";
        }
    }
    else{
        echo "Error";
    }
?>