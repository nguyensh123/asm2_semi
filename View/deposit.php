<?php include('links.php') ?>

<body>
    <?php include('header.php') ?>
    
    <div class="container p-3 mb-3">
    <?php if($_SESSION["login"]==null){
            echo "Bạn cần đăng nhập để truy cập vào trang này! ";
            exit;
        }?>
        <form action="" method="post">
            <input type="hidden" name="action" value="deposit">
        <h2 class="text-center mb-3">Deposit money into your account</h2>
        <div class="row form-group">
                <div class="col-12 mb-3 ">
                    <label class="text-danger"><h5>Full Name:</h5></label>
                    <input type="text" class="form-control" readonly value="<?php echo $viewFullName?>">
                </div>
                <div class="col-12 mb-3 ">
                    <label class="text-danger  "><h5>Deposit money:</h5></label>
                    <input type="number" class="form-control" name="money" placeholder="VND">
                </div>
                <div class="col-12 mb-3">
                    <label class="text-danger  "><h5>password:</h5></label>
                    <input type="password" class="form-control" name="pass">
                </div>
                <div class="mx-auto">
                    <a href="account.php">
                    <button type="button" class="btn btn-primary mt-3">Cancel</button></a>
                <button type="submit" class="btn btn-primary mt-3">Recharge</button>
                </div>
        </div>
    </form>
    </div>
    <?php include('footer.php') ?>
</body>