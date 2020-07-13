<div class="h5">ระบบ Coupon</div>
<button class="btn btn-outline-success text-right" data-toggle="modal" data-target="#addCouponModal" id="addCoupon">เพิ่มคูปอง</button>
<div class="card mt-2">
    <div class="card-body">
        <h3>coupon ทั้งหมด</h3>

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">โค้ด</th>
                    <th scope="col">มูลค่า</th>
                    <th scope="col">ลบ</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $result = getAllCoupon();
                $i = 1;
                if($result->num_rows>0){

                while($row = $result->fetch_assoc()){
                    
                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row['code']."</td>";
                    echo "<td>".$row['value']." บาท</td>";
                    echo "<td><a onclick='deleteCouponFunc(".$row['id'].");' class='btn btn-danger text-white btn-sm'>ลบ</a></td>";
                    echo "</tr>";
                    $i++;
                }}else{
                    echo "ยังไม่มีคูปองที่สร้าง";
                    echo "<hr>";
                }

            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="addCouponModal" tabindex="-1" role="dialog" aria-labelledby="addCouponModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มคูปอง</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
            <form action="" method="post">
            <div class="form-group">
                <input type="number" name="value" id="" class="form-control" required placeholder="ใส่ราคาคูปอง" min="0"
                    max="1000">
            </div>
            <button type="submit" class="btn btn-outline-success">เพิ่ม coupon</button>
        </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        
        
        $('#myTable').DataTable();
        

        deleteCouponFunc = (id) => {
            $.sweetModal.confirm('ยืนยัน', 'ต้องการลบ  ?', function () {
                $.ajax({
                    url: 'system/deleteCoupon.php',
                    type: 'POST',
                    data: { "couponID": id },
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
    });</script>