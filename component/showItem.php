<div class="row">

<?php 
    
    require ('system/sql.php');
    $sql = "select * from items";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-3">
            <div class="card" style="width: 10rem;">
                <img src="./assets/img/items/<?php echo $row['name']; ?>.png" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['label']; ?></h5>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    <a href="buy?item=<?php echo $row['name']; ?>" class="btn btn-primary">ซื้อ</a>
                    <a href="buy?item=<?php echo $row['name']; ?>" class="btn btn-primary">ใส่ตะกร้า</a>
                </div>
            </div>
        </div>
        <?php
    }


?>
</div>
