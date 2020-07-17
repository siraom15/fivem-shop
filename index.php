<?php 
  require ('config.php');
  require ('steamauth/steamauth.php');
  require ('system/function.php');
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/jquery.sweet-modal.min.css" />
  
  <!-- JS, Popper.js, and jQuery -->
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/52f6283ccc.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  <script src="./assets/js/jquery.sweet-modal.min.js"></script>
  
</head>

<body class="kanit bg-fivem">

  <nav class="navbar navbar-expand-lg navbar-dark bg-black m-2 rounded shadow-lg d-flex justify-content-center"
    style="align-content: center;">

    <a href="index.php" class="text-white"><i class="fas fa-home"></i> หน้าแรก &nbsp;</a>
    <a href="?page=topup" class="text-white"> <i class="fas fa-money-bill-wave-alt"></i> เติมเงิน&nbsp;</a>
    <a href="?page=shop" class="text-white"> <i class="fas fa-shopping-cart"></i> ร้านค้า&nbsp;</a>
    <img src="https://imgur.com/m7jsXQM.png" alt="" srcset="" height="20%">
    <?php if(isset($_SESSION['steamid'])){
      include ('steamauth/userInfo.php');
      if(getPlayerGroup($steamprofile['steamid64'])=='superadmin'){
        echo '<a href="?page=admin" class="text-white"><i class="fas fa-user-shield"></i>
        ระบบแอดมิน &nbsp;</a>';
      }
    ?>
    <a href="index.php" class="text-white"><i class="fas fa-user"></i>
      ข้อมูลส่วนตัว &nbsp;</a>
    <a href="?logout" class="text-white"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ &nbsp;</a>
    
    <?php
    
    }else{
      ?>

    <a data-toggle="modal" href="#" data-target="#exampleModal" class="text-white"><i class="fas fa-sign-in-alt"></i>
      เข้าสู่ระบบ &nbsp;</a>
    <?php 
    } ?>
    <a href="?page=howtoplay" class="text-white"><i class="fas fa-info-circle"></i> วิธีเล่น &nbsp;</a>
  </nav>
  <?php 
    if(!isset($_SESSION['steamid'])){
      ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body ">
            <div class="h4 text-center">กรุณาเข้าสู่ระบบก่อน</div>
            <div class="h4 text-center"> <?php loginbutton(); ?></div>
          </div>
        </div>
      </div>

    </div>

  </div>
  <?php
    }else{
      // include ('steamauth/userInfo.php');
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-3 col-lg-3 offset-sm-0 offset-md-2 offset-lg-2">
       <?php
          require ('component/profile.php');
       ?>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-body p-5">
            <?php
            if(isset($_GET['page'])){
              $page = $_GET['page'];
              if($page=='topup'){
                require ('component/topup.php');
              }
              else if($page=='shop'){
                require ('component/shop.php');
              }
              else if($page=='admin'){
                if(getPlayerGroup($steamprofile['steamid64'])=='superadmin'){
                    require ('component/admin.php');
                }else{
                  require ('component/showInventory.php');
                }
              }

            }else{
              require('component/showInventory.php');
            }
        ?>
          </div>
        </div>

      </div>
    </div>
  </div>
  <?php
  }
  ?>




  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เข้าสู่ระบบโดย Steam </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex justify-content-center">
          <?php loginbutton(); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        </div>
      </div>
    </div>
  </div>
</body>



</html>