<?php include('links.php') ?>

<body>
    <?php include('header.php') ?>
   
    <div class="container p-3 mb-3">
    <?php if($_SESSION["login"]==null){
            echo "Bạn cần đăng nhập để truy cập vào trang này! ";
            exit;
        }?>
        <form action="../Controller/controller.php" method="post">
            <input type="hidden" name="action" value="changePassword">
        <h2 class="text-center mb-3">Đổi mật khẩu</h2>
        <div class="row form-group">
                <div class="col-12 mb-3 col-lg-6">
                    <label class="text-danger"><h5>Họ và tên:</h5></label>
                    <input type="text" readonly value="<?php echo $viewFullName ?>" class="form-control">
                </div>
                <div class="col-12 mb-3 col-lg-6">
                    <label class="text-danger  "><h5>Mật khẩu hiện tại:</h5></label>
                    <input type="password" required name="pass" class="form-control">
                </div>
                <div class="col-12 mb-3 col-lg-6">
                    <label class="text-danger  "><h5>Mật khẩu mới:</h5></label>
                    <input type="password" required name="newPass" class="form-control">
                </div>
                <div class="col-12 mb-3 col-lg-6">
                    <label class="text-danger  "><h5>Xác nhận mật khẩu:</h5></label>
                    <input type="password" required name="reNewPass" class="form-control">
                </div>
                <div class="mx-auto">
                    <a href="account.php">
                    <button type="button" class="btn btn-primary mt-3">Hủy bỏ</button></a>
                <button type="submit" class="btn btn-primary mt-3">Đổi mật khẩu</button>
                </div>
        </div>
    </form>
    </div>
    <?php include('footer.php') ?>
</body>