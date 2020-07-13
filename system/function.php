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
        if(getPlayerWebMoney($steamid)>=$price){
            require('sql.php');
            $sql = sprintf('UPDATE users SET web_money = web_money - "%s" WHERE identifier = "%s" ',$price, $steamid);
                if ($conn->query($sql) === TRUE) {
                    $addItemStatus = addItemToPlayer($steamid, $item, 1);
                    if($addItemStatus==TRUE){
                        return 1;
                    }else{
                        return 0;
                    }
                } else {
                    return 0;
                }
            $conn->close();
        }else{
            return 0;
        }
    }

    function addItemToPlayer($steamid, $item, $value){
        require('sql.php');
        $sql = sprintf('UPDATE user_inventory SET count = count + "%s" WHERE identifier = "%s" AND item = "%s" ',$value, $steamid, $item);
        if($conn->query($sql)===TRUE){
            return 1;
        }else{
            return 0;
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

    function getWebItems(){
        require('sql.php');
        $sql = sprintf("SELECT * FROM web_items");
        $result = $conn->query($sql);
        return $result;
        $conn->close();
    }

    function getWebItemPrice($itemName){
        require('sql.php');
        $sql = sprintf("SELECT * FROM web_items WHERE items_name = '%s'", $itemName);
        $result = $conn->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                return $row['price'];
            }
        }
        else{
             return 0;
        }
        $conn->close();
    }

    function deleteWebItem($itemID){
        require('sql.php');
        $sql = sprintf("DELETE FROM web_items WHERE id = '%s'", $itemID);
        $result = $conn->query($sql);
        if($result===TRUE){
            return 1;
        }else{
            return 0;
        }
        $conn->close();
    }
    function deleteCouponItem($couponID){
        require('sql.php');
        $sql = sprintf("DELETE FROM coupon WHERE id = '%s'", $couponID);
        $result = $conn->query($sql);
        if($result===TRUE){
            return 1;
        }else{
            return 0;
        }
        $conn->close();
    }

    function addWebItem($label, $itemName, $price){
        require('sql.php');
        $sql = sprintf("INSERT INTO web_items (label, items_name, price) VALUE ('%s', '%s', '%s')", $label, $itemName, $price);
        $result = $conn->query($sql);
        if($result===TRUE){
            return 1;
        }else{
            return 0;
        }
        $conn->close();

    }
?>