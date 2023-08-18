<?php include('../Controller/admin_controller.php'); ?>
<?php if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null):{
    echo "Bạn cần quyền để đăng nhập";
}?>
<?php else: ?>
<?php include('header.php'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Brands</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">List Brand</li>
            </ol>
            <?php 
            if(isset($mess)){
                echo $mess;
            }
            ?>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách nhãn hàng
                </div>
                <form action="" method="get">
                    <input type="hidden" value="Bsearch" name="action">
                    <div class="input-group mx-auto mt-3" style="width:45%;">
                        <input type="search" class="form-control rounded" required placeholder="Search"
                            name="Bsearch" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
                <div class="text-right">
                    <button type="button" class="btn mr-3 text-primary" data-toggle="modal" data-target="#addBrand">
                        Thêm thương hiệu
                    </button></div>
                    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Thêm thương hiệu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="action" value="addBrand">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="form-label">Tên thương hiệu:</label>
                                        <input type="text" required name="brandName" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Brand Id</th>
                                    <th>Brand Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (Count($listBrand)<1):{
                                echo "Không tìm thấy kết quả phù hợp!";
                            }?>
                                <?php else: ?>
                                <?php foreach ($listBrand as $key => $value):?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $value['Brand_id']?>
                                    </td>
                                    <td>
                                        <?php echo $value['Brand_name']?>
                                    </td>
                                    <td class="text-center  ">
                                    <button type="button" class="btn mr-3 text-primary" data-toggle="modal" data-target="#editBrand<?php echo $key?>">
                                        <i class="fa fa-edit text-primary" aria-hidden="true"></i>
                                </button>
                                        <a href="../Controller/admin_controller.php?action=deleteBrand&id=<?php echo $value['Brand_id'] ?>"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            <i class="fa fa-times text-danger" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <!-- edit brand -->

                                <div class="modal fade" id="editBrand<?php echo $key?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update thương hiệu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden" name="action" value="updateBrand">
                                <div class="modal-body">
                                <div class="form-group">
                                        <label class="form-label">Mã thương hiệu:</label>  
                                        <input type="text"  name="brandId" readonly class="form-control" value="<?php echo $value['Brand_id']?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Tên thương hiệu:</label>  
                                        <input type="text" required name="brandName" class="form-control" value="<?php echo $value['Brand_name']?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                                <!-- edit brand -->
                                <?php endforeach; ?>
                                <?php endif;?>
                            </tbody>    
                        </table>

                    </div>
                
            </div>
    </main>
    <?php include('footer.php'); ?>
    <?php endif;?>