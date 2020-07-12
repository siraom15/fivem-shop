<?php 
    if(isset($_GET['buy'])){
        $status = buyItem($steamprofile['steamid64'],'gacha',20);
        if($status==1){
            echo "<script>alert('ซื้อสำเร็จ');</script>";
        }
        else if($status==3){
            echo "<script>alert('เงินไม่เพียงพอ');</script>";
        }
    }
?>
<div class="h4">สินค้า</div>
<hr>