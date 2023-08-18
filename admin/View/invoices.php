<?php include('../Controller/admin_controller.php'); ?>
<?php if(!isset($_SESSION["admin"]) || $_SESSION["admin"] == null):{
    echo "Bạn cần quyền để đăng nhập";
}?>
<?php else: ?>
<?php include('header.php'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Invoices</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">list invoice</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Danh sách đơn hàng
                </div>
                <form action="" method="get">
                    <input type="hidden" value="Isearch" name="action">
                    <div class="input-group mx-auto mt-3" style="width:45%;">
                        <input type="search" class="form-control rounded" required placeholder="Search" name="Isearch" />
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Invoice Id</th>
                                <th>User Name</th>
                                <th >Quantity type product</th>
                                <th>Ship Code</th>
                                <th >Invoice Total</th>
                                <th>Address</th>
                                <th>InvoiceDate</th>
                                <th>Status</th>
                                <th>Detail</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (Count($invoices)<1):{
                                echo "Không tìm thấy kết quả phù hợp!";
                            }?>
                            <?php else: ?>
                            <?php foreach ($invoices as $key => $value):?>
                            <tr >
                                <td class="text-center"> 
                                    <?php echo $value['invoice_id']?>
                                </td>
                                <td >
                                    <?php echo $value['user_name']?>
                                </td>
                                <td class="text-center">
                                   <?php echo $value['quantity_product'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo number_format($value['shipCode'],0,","," ")?> VND
                                </td>
                                <td class="text-center">
                                    <?php echo number_format($value['invoice_total'],0,","," ")?> VND
                                </td>
                                <td >
                                    <?php echo $value['delivery_address']?>
                                </td>
                                <td class="text-center">
                                    <?php echo $value['invoice_date'] ?>
                                </td>
                                <td class="text-center">
                                <?php echo $value['Status'] ?>
                                </td>
                                <td class="text-center">
                                    <a href="detailInvoice.php?action=detailInvoice&id=<?php echo $value['invoice_id']?>">chi tiết</a>
                                </td>
                                <td><?php if($value['Status']=="Đã thanh toán"):?>
                                    <a href="../Controller/admin_controller.php?action=ship&id=<?php echo $value['invoice_id']?>" onclick="return confirm('Bạn có chắc chắn muốn duyệt đơn hàng?')">Duyệt đơn hàng</a>
                                    <?php endif?>
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