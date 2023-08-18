<?php include('../Controller/admin_controller.php'); ?>
<?php if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null):{
    echo "Bạn cần quyền để đăng nhập";
}?>
<?php else: ?>
<?php include('header.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Doanh thu theo tháng
                                    </div>

                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Doanh thu theo sản phẩm
                                    </div>
                                   
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Sản phẩm đã bán
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng đã bán</th>
                                            <th>Tổng thu</th>
                                            <th>Tồn kho</th>
                                        </tr>
                                    </thead>    
                                    <tfoot>
                                        <tr>
                                        <th>Tên sản phẩm</th>
                                            <th>Giá tiền</th>
                                            <th>Số lượng đã bán</th>
                                            <th>Tổng thu</th>
                                            <th>Tồn kho</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($listProduct as $key => $value):
                                            if($value['numberOfSale']>0):?>
                                        <tr>
                                            <td><?php echo $value['product_name']?></td>
                                            <td><?php echo number_format($value['price'],0,"."," ") .' VND' ?></td>
                                            <td ><?php echo $value['numberOfSale']?></td>
                                            <td><?php echo number_format($value['price']*$value['numberOfSale'],0,"."," ") .' VND'?></td>
                                            <td> <?php echo $value['quantity'] ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include('footer.php'); ?>
<?php endif;?>