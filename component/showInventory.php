<div class="h3">ไอเท็มในตัว</div>
<hr>
<div class="row">

<?php 
    
    require ('system/sql.php');
    $sql = sprintf("select * from user_inventory where identifier = '%s' AND count > 0" ,$steamprofile['steamid64']);
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-3">
            <div class="card">
                <img src="./assets/img/items/<?php echo $row['item']; ?>.png" class="card-img-top img-fluid">
                <div class="card-body">
                    <h5 class="card-title"><?php echo getItemThaiName($row['item']); ?></h5>
                    <p>จำนวน : <?php echo $row['count']; ?></p>
                </div>
            </div>
        </div>
        <?php
    }


?>
</div>
