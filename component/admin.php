<?php 
    if(getPlayerGroup($steamprofile['steamid64'])!='superadmin'){
        header('index.php');    
    }else{
        if(isset($_POST['value'])){
            $value = $_POST['value'];
            echo '<div class="alert alert-success" role="alert"> Coupon Code : '.createCoupon($value).' | ราคา : '.$value.' บาท</div>';
            
        }
?>

<div class="h5">ระบบ Admin</div>
<hr>

<div class="card">
        <div class="card-body">
            <h3>เพิ่ม coupon</h3>
            <form action="" method="post">
                <div class="form-group">
                    <input type="number" name="value" id="" class="form-control" required placeholder="ใส่ราคาคูปอง" min="0" max="1000">
                </div>
                <button type="submit" class="btn btn-outline-success">เพิ่ม coupon</button>
            </form>
        </div>
</div>

<div class="card mt-2">
        <div class="card-body">
            <h3>coupon ทั้งหมด</h3>
           
            <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">โค้ด</th>
                    <th scope="col">มูลค่า</th>
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
                    echo "</tr>";
                    $i++;
                }}else{
                    echo "ยังไม่มีคูปองที่สร้าง";
                }

            ?>
                </tbody>
                </table>
        </div>
</div>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );</script>
<?php
    }
?>