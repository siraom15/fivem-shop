<?php 
    function getPlayerNameBySteamId($steamid){
        require('sql.php');
        $sql = sprintf("select * from users where identifier = '%s' ", $steamid);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row['name'];
            }
        }
        $conn->close();
    }

    function getPlayerMoney($steamid){
        require('sql.php');
        $sql = sprintf("select * from users where identifier = '%s' ", $steamid);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row['money'];
            }
        }
        $conn->close();
    }
    function getPlayerBankMoney($steamid){
        require('sql.php');
        $sql = sprintf("select * from users where identifier = '%s' ", $steamid);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row['bank'];
            }
        }
        $conn->close();
    }
    function getplayerJob($steamid){
        require('sql.php');
        $sql = sprintf("select * from users where identifier = '%s' ", $steamid);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return getJobThaiName($row['job']);
            }
        }
        $conn->close();
    }

    function getItemThaiName($itemName){
        require('sql.php');
        $sql = sprintf("select * from items where name = '%s' ", $itemName);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row['label'];
            }
        }
        $conn->close();
    }
    function getJobThaiName($jobName){
        require('sql.php');
        $sql = sprintf("select * from jobs where name = '%s' ", $jobName);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row['label'];
            }
        }
        $conn->close();
    }

    function addWebMoneyToPlayer($money,$steamid){
        require('sql.php');
        $sql = sprintf('UPDATE users SET web_money = web_money + "%s" WHERE identifier = "%s" ',$money, $steamid);
        // echo $sql;
        if ($conn->query($sql) === TRUE) {
            return 1;
          } else {
            return 0;
          }
        $conn->close();
    }
    function getPlayerWebMoney($steamid){
        require('sql.php');
        $sql = sprintf("select * from users where identifier = '%s' ", $steamid);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row['web_money'];
            }
        }
        $conn->close();
    }
    function updateCoupon($couponId){
        require('sql.php');
        $sql = sprintf("UPDATE coupon SET isUse = 1 WHERE id = '%s' ", $couponId);
        if ($conn->query($sql) === TRUE) {
            return 1;
          } else {
            return 0;
          }
        $conn->close();

    }

    function buyItem($steamid, $item, $price){
        if(getPlayerWebMoney($steamid)>$price){
            require('sql.php');

        $sql = sprintf('UPDATE users SET web_money = web_money - "%s" WHERE identifier = "%s" ',$price, $steamid);
        // echo $sql;
        if ($conn->query($sql) === TRUE) {
            return 1;
          } else {
            return 0;
          }
        $conn->close();
        }else{
            return 3;
        }
    }

    function createCoupon($value){
        require('sql.php');
        $randomCode = generateRandomString(10);
        $sql = sprintf("INSERT INTO coupon (code, value, isUse) value ('%s','%s',0 )",$randomCode,$value);
        if ($conn->query($sql) === TRUE) {
            return $randomCode;
          } else {
            return 0;
          }
        $conn->close();
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getPlayerGroup($steamid){
        require('sql.php');
        $sql = sprintf("select * from users where identifier = '%s' ", $steamid);
        // echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                return $row['group'];
            }
        }
        $conn->close();
    } 
    
    function getAllCoupon(){
        require('sql.php');
        $sql = sprintf("SELECT * FROM coupon WHERE isUse = 0");
        // echo $sql;
        $result = $conn->query($sql);
        return $result;
        $conn->close();
    }
?>