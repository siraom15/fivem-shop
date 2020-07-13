<?php 
    session_start();
    require ('function.php');
    if(isset($_POST['itemId'])){
        $itemID = $_POST['itemId'];
        // check player have enough money
        $status = deleteWebItem($itemID);
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