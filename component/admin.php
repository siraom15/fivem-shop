<?php 
    if(getPlayerGroup($steamprofile['steamid64'])!='superadmin'){
        header('index.php');    
    }else{
        if(isset($_POST['value'])){
            $value = $_POST['value'];
            echo '<div class="alert alert-success" role="alert"> Coupon Code : '.createCoupon($value).' | ราคา : '.$value.' บาท</div>';
            
        }
        else if(isset($_POST['addItem'])){
            $itemName = $_POST['itemName'];
            $price = $_POST['price'];
            $status = addWebItem($itemName, $price);
            if($status == 1){
                echo "<script>";
                echo "$.sweetModal({
                    content: 'เพิ่มสำเร็จ',
                    icon: $.sweetModal.ICON_SUCCESS

                });";
                echo "</script>";
            }else{
                echo "<script>";
                echo "$.sweetModal({
                    content: 'เพิ่มไม่สำเร็จ',
                    icon: $.sweetModal.ICON_ERROR

                });";
                echo "</script>";
            }

        }
?>

<div class="h4">ระบบ Admin</div>
<hr>
<!-- ระบบคูปอง -->
<?php require ('admin/coupon.php') ?>
<hr>
<!-- ระบบ ITEM -->
<?php require ('admin/item.php') ?>




<?php
    }
?>