<?php include('links.php') ?>
<style>
    h5>input{
        width: 400px!important;
        height: 30px!important;
        color: red!important;
    }
</style>
<body>
    <?php include('header.php') ?>
    
    <div class="container p-2 mb-3 ">
    <?php if($_SESSION["login"]==null){
            echo "Bạn cần đăng nhập để truy cập vào trang này! ";
            exit;
        }?>
    <?php if(isset($_SESSION['mess'])) echo $_SESSION['mess'];
    $_SESSION['mess']=null; ?>
        <h3 class=" text-uppercase text-center">Cập nhật thông tin</h3>
        <form action="../Controller/controller.php" method="post">
            <input type="hidden" name="action" value="update_user">
            <div class="form-group">
            <div class="row ml-5 mt-3">
                <h5 class="font-weight-normal "> <label class="form-label">Họ và Tên:</label>
                    <input type="text" required class="form-control" name="full_name_ud" value="<?php echo $viewFullName  ?>">
                </h5>
            </div>
            <div class="row ml-5 mt-3">
                <h5 class="font-weight-normal"><label class="form-label">Tên tài khoản:</label>
                    <input type="text" required class="border-0" class="form-control" readonly name="user_name_ud" value="<?php echo $viewUserName ?>"> 
                </h5>
            </div>
            <div class="row ml-5 mt-3">
                <h5 class="font-weight-normal"><label class="form-label">Email:</label>
                   <input type="email" required name="email_ud" class="form-control" value="<?php echo $viewEmail ?>"> 
                </h5>
            </div>
           
            <div class="row ml-5 mt-3">
                <h5 class="font-weight-normal"><label class="form-label">Địa chỉ:</label>
                   <input type="text" required name="address_ud" class="form-control" value="<?php echo $viewAddress ?>"> 
                </h5>
            </div>
            <div class="row ml-5 mt-3">
                <h5 class="font-weight-normal"><label class="form-label">Xác nhận mật khẩu:</label>
                   <input type="password" required name="pass" class="form-control" placeholder="Bạn phải nhập mật khẩu để thay đổi thông tin!" > 
                </h5>
            </div>
        </div>

            <div class="row ml-5 mt-3">
                <a href="account.php">
                <button type="button" class="btn btn-primary ml-3 mb-3 ">Hủy bỏ</button></a>
                <button type="submit" class="btn btn-primary ml-3 mb-3">Lưu lại</button>
            </div>
        </form>
    </div>
    
    <?php include('footer.php') ?>
</body>