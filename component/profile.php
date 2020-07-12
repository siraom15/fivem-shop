<div class="card">
    <div class="card-body">
    <div class="h3 text-center ">ข้อมูลส่วนตัว</div>
    <img src="<?php echo $steamprofile['avatarfull']; ?>" class="rounded-circle mx-auto d-block" alt="...">
    <p>ชื่อ : <?php echo getPlayerNameBySteamId($steamprofile['steamid64']); ?> </p>
    <p>เงินติดตัว : <?php echo getPlayerMoney($steamprofile['steamid64']); ?> บาท</p>
    <p>เงินใน bank :<?php echo getPlayerBankmoney($steamprofile['steamid64']); ?> บาท</p>
    <p>อาชีพ : <?php echo getPlayerJob($steamprofile['steamid64']); ?></p>
    <hr>
    <p>เงินในเว็บ : <?php echo getPlayerWebMoney($steamprofile['steamid64']); ?> บาท</p>
    </div>
</div>