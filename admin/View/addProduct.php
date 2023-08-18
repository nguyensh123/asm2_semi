<?php include('../Controller/admin_controller.php'); ?>
<?php if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null):{
    echo "Bạn cần quyền để đăng nhập";
}?>
<?php else: ?>
<?php include('header.php'); ?>
<?php include('../css/uploads.php'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Products</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add New Product</li>
            </ol>
            <form action="../Controller/admin_controller.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="addProduct">
                <div class="row">
                    <div class="row ">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">

                            <!-- Upload image input-->
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" name="photo" type="file" required onchange="readURL(this);" class="form-control border-0">
                                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose
                                    file</label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                            class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                            class="text-uppercase font-weight-bold text-muted">Choose
                                            file</small></label>
                                </div>
                            </div>

                            <!-- Uploaded image area-->
                            <p class="font-italic text-black text-center">The image uploaded will be rendered inside the
                                box below.</p>
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                                    class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                        </div>
                        <div class="col-7">
                            <div class="input-group mt-3 ml-4">
                                <div class="form-group">
                                    <label class="form-label">Tên sản phẩm:</label>
                                    <input type="text" required name="productName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mã số thương hiệu:</label>
                                    <input type="number" name="brandId" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Giá:</label>
                                    <input type="number" name="price" required class="form-control" placeholder="VND">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Chi tiết:</label>
                                    <textarea name="detail" class="form-control" > </textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số lượng:</label>
                                    <input type="number" name="quantity" required class="form-control">
                                </div>
                                <div class="mx-auto">
                                    <a href="products.php" class="btn btn-primary">Hủy</a>
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
</div>
</main>
<?php include('footer.php'); ?>
<?php endif;?>