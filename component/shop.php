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
<div class="row">
<?php 

    $data = getWebItems();
    if($data->num_rows>0){
        while($row = $data->fetch_assoc()){
            ?>
            <div class="card" style="width: 10rem;">
                <img src="./assets/img/items/<?php echo $row['items_name'] ?>.png" alt="" srcset="" class="img-fluid card-img-top">
                <div class="card-body">
                    <div class="h5 card-title"><?php echo getItemThaiName($row['items_name']) ?></div>
                    <div class="p card-text">ราคา : <?php echo $row['price'] ?> บาท</div>
                    <hr>
                    <button type="submit" class="btn btn-outline-success btn-sm" onclick="buy('<?php echo $row['items_name']; ?>')">ซื้อสิ่งนี้</button>
                </div>
            </div>
            <?php
        }
    }else{
        echo "ยังไม่มีสินค้าขายตอนนี้";
    }

?>
</div>

<script src="sweet-modal/dist/min/jquery.sweet-modal.min.js"></script>
<script>
    $(document).ready(()=>{
        buy = (items_name) =>{
            $.sweetModal.confirm('ยืนยัน','ต้องการซื้อ '+ items_name+' ?', function() {
                $.ajax({
                url: 'system/buy.php',
                type: 'POST',
                data: {"items_name" : items_name},
                success: function(data) {
                    if(data ==1){
                        $.sweetModal({
                            content: 'ซื้อสำเร็จ',
                            icon: $.sweetModal.ICON_SUCCESS
                            
                        });
                    }
                    else{
                        $.sweetModal({
                            content: 'ซื้อไม่สำเร็จ',
                            icon: $.sweetModal.ICON_ERROR
                        });
                    }
                },
                error: function(e) {
                    console.log(e.message);
                }
            });
            });
           
        }
    });
</script>
