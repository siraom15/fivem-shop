<div class="h4">เติมเงินผ่านคูปอง</div>
<div class="row">
    <div class="col">
        <div class="card shadow-sm">
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <input type="text" name="coupon" id="couponCode" class="form-control" placeholder="ใส่รหัสคูปอง" maxlength="10" required>
                    </div>
                    <button type="submit" class="btn btn-secondary" class="form-control" id="topup">เติมเงิน</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#topup").click(()=>{
        let couponCode = $("#couponCode").val();
        $.ajax({
                    url: 'system/checkCoupon.php',
                    type: 'POST',
                    data: { "coupon": couponCode },
                    success: function (data) {
                        if (data != 0) {
                            $.sweetModal({
                                content: 'เติมเงินสำเร็จ '+data+' บาท',
                                icon: $.sweetModal.ICON_SUCCESS

                            });
                            
                        }
                        else {
                            $.sweetModal({
                                content: 'เติมเงินไม่สำเร็จ ไม่มีคูปองนี้',
                                icon: $.sweetModal.ICON_ERROR
                            });
                        }
                    },
                    error: function (e) {
                        console.log(e.message);
                    }
                });
        $("#couponCode").val("");
    })
</script>