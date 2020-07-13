<?php 
    session_start();
    require ('function.php');
    if(isset($_POST['couponID'])){
        $couponID = $_POST['couponID'];
        // check player have enough money
        $status = deleteCouponItem($couponID);
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