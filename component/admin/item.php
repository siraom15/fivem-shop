
<div class="h5">ระบบสินค้า</div>
<button class="btn btn-outline-success text-right" data-toggle="modal" data-target="#addItemModal" id="addItem">เพิ่มสินค้า</button>
<div class="card mt-2">
    <div class="card-body">
        <h3>จัดการสินค้าทั้งหมด</h3>

        <table class="table" id="itemTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อไทย</th>
                    <th scope="col">ชื่อ item ในเกม</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">แก้ไข</th>
                    <th scope="col">ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = getWebItems();
                $i = 1;
                if($result->num_rows>0){

                while($row = $result->fetch_assoc()){
                    
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".getItemThaiName($row['items_name'])."</td>";
                    echo "<td>".$row['items_name']."</td>";
                    echo "<td>".$row['price']." บาท</td>";
                    echo "<td><a onclick='editFunc(".$row['id'].");' class='btn btn-success text-white btn-sm'>แก้ไข</a></td>";
                    echo "<td><a onclick='deleteItemFunc(".$row['id'].");' class='btn btn-danger text-white btn-sm'>ลบ</a></td>";
                    echo "</tr>";
                    $i++;
                }}else{
                    echo "ยังไม่มีสินค้า";
                    echo "<hr>";
                }

            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <form method="POST">
                    <div class="form-group">
                        <label for="item-name">ชื่อ Item ในเกม</label>
                        <input type="text" name="itemName" class="form-control" id="item-name" placeholder="ใส่ชื่อ Item ในเกม" required>
                    </div>
                    <div class="form-group">
                        <label for="price">ราคา</label>
                        <input type="number" name="price" class="form-control" id="price" placeholder="ใส่ราคา" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="addItem">เพิ่มสินค้า</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editItem" tabindex="-1" role="dialog" aria-labelledby="editItemModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5">
                <form method="POST">
                    <div class="form-group">
                        <label for="item-name">ชื่อ Item ในเกม</label>
                        <input type="text" name="itemName" class="form-control" id="item-name-edit" placeholder="ใส่ชื่อ Item ในเกม" required>
                    </div>
                    <div class="form-group">
                        <label for="price">ราคา</label>
                        <input type="number" name="price" class="form-control" id="price-edit" placeholder="ใส่ราคา" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="editItem">อัปเดตสินค้า</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        
        
        $('#itemTable').DataTable();
        
        editFunc = (id) => {

            

        }

        deleteItemFunc = (id) => {
            $.sweetModal.confirm('ยืนยัน', 'ต้องการลบ  ?', function () {
                $.ajax({
                    url: 'system/deleteItem.php',
                    type: 'POST',
                    data: { "itemId": id },
                    success: function (data) {
                        if (data == 1) {
                            $.sweetModal({
                                content: 'ลบสำเร็จ',
                                icon: $.sweetModal.ICON_SUCCESS

                            });
                        }
                        else {
                            $.sweetModal({
                                content: 'ลบไม่สำเร็จ',
                                icon: $.sweetModal.ICON_ERROR
                            });
                        }
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                });
            });
        }
    });
</script>