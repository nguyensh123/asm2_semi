<?php include('../Controller/admin_controller.php'); ?>
<?php if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null):{
    echo "Bạn cần quyền để đăng nhập";
}?>
<?php else: ?>
<?php include('header.php'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Contacts</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">List contact</li>
            </ol>
            <?php 
            if(isset($mess)){
                echo $mess;
            }
            ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách phản hồi từ khách hàng
                </div>
                <form action="" method="get">
                    <input type="hidden" value="Csearch" name="action">
                    <div class="input-group mx-auto mt-3" style="width:45%;">
                        <input type="search" class="form-control rounded" required placeholder="Search"
                            name="Csearch" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
                    
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>ContactId</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th class="col-3">Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (Count($listContact)<1):{
                                echo "Không tìm thấy kết quả phù hợp!";
                            }?>
                                <?php else: ?>
                                <?php foreach ($listContact as $key => $value):?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $value['ContactId']?>
                                    </td>
                                    <td>
                                        <?php echo $value['FullName']?>
                                    </td>
                                    <td>
                                        <?php echo $value['Email']?>
                                    </td>
                                    <td>
                                        <?php echo $value['Message']?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $value['Status']?>
                                    </td>
                                    <td class="text-center  ">
                                    <?php if($value['Status']=="Chưa đọc"):?>
                                    <a href="../Controller/admin_controller.php?action=readContact&id=<?php echo $value['ContactId']?>"  class="btn btn-primary mr-2" >Đã đọc</a>
                                    <?php endif?>
                                        <a href="../Controller/admin_controller.php?action=deleteContact&id=<?php echo $value['ContactId'] ?>"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                                    </td>
                                </tr>

                                <?php endforeach; ?>
                                <?php endif;?>
                            </tbody>    
                        </table>

                    </div>
                
            </div>
    </main>
    <?php include('footer.php'); ?>
    <?php endif;?>