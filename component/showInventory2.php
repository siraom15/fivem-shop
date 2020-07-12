<div class="h3">ไอเท็มในตัว</div>
<hr>

<table class="table" id="myTable">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">รูป</th>
      <th scope="col">ชื่อ</th>
      <th scope="col">จำนวน</th>
    </tr>
  </thead>
  <tbody>
<?php 
    
    require ('system/sql.php');
    $sql = sprintf("select * from user_inventory where identifier = '%s' AND count > 0" ,$steamprofile['steamid64']);
    $result = $conn->query($sql);
    $i = 1;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo '<td><img style="display:block;" width="50%" height="100%" src="./assets/img/items/'.$row['item'].'.png" /></td>';
        // echo "<td><img src='./assets/img/items/".$row['item'].".png' class='card-img-top img-fluid' heigth='20%'></td>";
        echo "<td>".getItemThaiName($row['item'])."</td>";
        echo "<td>".$row['count']."</td>";
        echo "</tr>";
      $i++;
    }


?>
</tbody>
</table>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>