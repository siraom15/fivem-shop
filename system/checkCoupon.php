<?php 
    if(isset($_POST['coupon'])){
        session_start();
        require ('sql.php');
        require ('function.php');
        $sql = sprintf("select * from coupon where code = '%s' AND isUse = 0" ,$_POST['coupon']);
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                // echo "coupon : ".$row['value'] . "บาท";
                $status = addWebMoneyToPlayer($row['value'],$_SESSION['steamid64']);
                if($status==1){
                    $res = updateCoupon($row['id'],$_SESSION['steamid64']);
                    if($res==1){
                        echo $row['value'];
                        
                    }
                }
            }
        }else{
            echo "0";
            

        }
    }

?>