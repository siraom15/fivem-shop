<div class="h3">ไอเท็มในตัว</div>
<hr>
<div class="row d-flex justify-content-start">
<?php 
    
    require ('system/sql.php');
    $sql = sprintf("select * from user_inventory where identifier = '%s' AND count > 0" ,$steamprofile['steamid64']);
    $data = $conn->query($sql);
    if($data->num_rows>0){
        while($row = $data->fetch_assoc()){
            ?>
            <div class="card" style="width: 10rem;">
                <img src="./assets/img/items/<?php echo $row['item'] ?>.png" alt="" srcset="" class="img-fluid card-img-top">
                <div class="card-body">
                    <hr>
                    <div class="h5 card-title"><?php echo getItemThaiName($row['item']); ?></div>
                    <div class="p card-text">จำนวน : <?php echo $row['count'] ?> ชิ้น</div>
                </div>
            </div>
            <?php
        }
    }else{
        echo "ไม่มีไอเท็ม";
    }


?>
</div>


