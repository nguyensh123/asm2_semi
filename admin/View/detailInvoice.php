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
                <li class="breadcrumb-item active">Detail Invoice</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Order Details
                </div>
                <div class="card-body">
                <h5 class="ml-3">Customer Name: <?php echo $invoice->getUser_name();?></h5> 
                <h5 class="ml-3">Order ID: <?php echo $invoice->getInvoice_id();?></h5> 
                <h5 class="ml-3">Day of Buy: <?php echo date("d/m/Y H:i' s",$time);?></h5>
                <h5 class="ml-3">Address:<?php echo $invoice->getDelivery_address();?> </h5>
                <h5 class="ml-3 text-primary">Product</h5>
        <table class="table">
        
        <thead >
          <tr>
            <th class="col-1">#</th>
            <th class="col-4">Produt Name</th>
            <th class="col-2">Price</th>
            <th class="col-2">Value</th>
            <th class="col-2">Total</th>
            <th class="col-1">Cancel</th>
          </tr>
        </thead>
        <tbody class="border-bottom">
        <?php foreach( $details as $key => $item ) : 
                          $index +=1;
                          $total+=$item['price']*$item['quantity'];
                      ?>    
          <tr>
            <th ><?php echo $index ?></th>
            <td><?php echo $item['product_name']; ?></td>
            <td><?php echo $item['brand_name'] ?></td>
            <td><?php echo number_format($item['price'],0,'.',' ')." VND" ?></td>
            <td class="text-center  "><?php echo $item['quantity']?></td>
            <td><?php echo number_format($item['price']*$item['quantity'],0,'.',' ')." VND" ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <h5 class="ml-3   ">Total: <?php echo number_format($total,0,'.',' ')." VND" ?></h5>
      <h5 class="ml-3   ">Shipping fee: <?php echo number_format($invoice->getShipCode(),0,'.',' ')." VND" ?></h5>
      <?php if($invoice->getStatus()=="Đã thanh toán"): ?>
      <h5 class="ml-3   ">The amount paid: <?php echo number_format($total+$invoice->getShipCode(),0,'.',' ')." VND" ?></h5>
      <?php elseif($invoice->getStatus()=="Đã giao hàng"): ?>
        <h5 class="ml-3   ">The amount paid: <?php echo number_format($total+$invoice->getShipCode(),0,'.',' ')." VND" ?></h5>
        <h5 class="ml-3   ">Status : Delivering</h5>
        <?php else:?>
          <h5 class="ml-3   ">Status : Cancel.</h5> 
          <?php endif; ?>             
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
    <?php endif;?>