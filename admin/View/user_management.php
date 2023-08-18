<?php include('../Controller/admin_controller.php'); ?>
<?php if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null):{
    echo "Bạn cần quyền để đăng nhập";
}?>
<?php else: ?>
<?php include('header.php'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">User</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách người dùng
                </div>
                <form action="" method="get">
                    <input type="hidden" value="search" name="action">
                    <div class="input-group mx-auto mt-3" style="width:45%;">
                        <input type="search" class="form-control rounded" required placeholder="Search" name="search" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>UserID</th>
                                <th>User Name</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (Count($listUsers)<1):{
                                echo "Không tìm thấy User!";
                            }?>
                            <?php else: ?>
                            <?php foreach ($listUsers as $key => $value):?>
                            <tr>
                                <td>
                                    <?php echo $value['user_id']?>
                                </td>
                                <td>
                                    <?php echo $value['user_name']?>
                                </td>
                                <td>
                                    <?php echo $value['full_name']?>
                                </td>
                                <td>
                                    <?php echo $value['email']?>
                                </td>
                                <td>
                                    <?php echo $value['address']?>
                                </td>
                                <td>
                                    <?php echo $value['position'] ?>
                                </td>
                                <td>
                                    <a href="../Controller/admin_controller.php?action=Delete&id=<?php echo $value['user_id']?>"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        <i class="fa fa-times text-danger ml-2" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif;?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
    <?php endif;?>