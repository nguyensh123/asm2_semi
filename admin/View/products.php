
<?php include('../Controller/admin_controller.php'); ?>
<?php if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null):{
    echo "Bạn cần quyền để đăng nhập";
}?>
<?php else: ?>
<?php include('header.php'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Products</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Products currently on sale</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách sản phẩm
                </div>
                <form action="" method="get">
                    <input type="hidden" value="Psearch" name="action">
                    <div class="input-group mx-auto mt-3" style="width:45%;">
                        <input type="search" class="form-control rounded" required placeholder="Search" name="Psearch" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
                <div class="text-right">
                <a href="addproduct.php" class="text-decoration-none mr-3">Thêm sản phẩm</a></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th >Image</th>
                                <th>Brand Id</th>
                                <th class="col-3">Detail</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>View</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (Count($listProduct)<1):{
                                echo "Không tìm thấy product!";
                            }?>
                            <?php else: ?>
                            <?php foreach ($listProduct as $key => $value):?>
                            <tr >
                                <td class="text-center"> 
                                    <?php echo $value['product_id']?>
                                </td>
                                <td >
                                    <?php echo $value['product_name']?>
                                </td>
                                <td>
                                    <img src="../controller/upload/<?php echo $value['img_product'] ?>" alt="anhDT" width="50px" height="50px">
                                </td>
                                <td class="text-center">
                                    <?php echo $value['brand_id']?>
                                </td>
                                <td>
                                    <div class="text">
                                    <?php echo $value['product_detail']?>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <?php echo number_format($value['price'],0,","," ")?> VND
                                </td>
                                <td class="text-center">
                                    <?php echo $value['quantity'] ?>
                                </td>
                                <td>
                                    <?php echo $value['Product_view'] ?>
                                </td>
                                <td>
                                    <?php echo $value['Product_date(date)'] ?>
                                </td>
                                <td class="text-center  ">
                                <a href="update_product.php?action=update&id=<?php echo $value['product_id'] ?>"><i class="fa fa-edit text-primary" aria-hidden="true"></i></a>
                                <a href="../Controller/admin_controller.php?action=deleteProduct&id=<?php echo $value['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                <i class="fa fa-times text-danger" aria-hidden="true"></i></a>
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