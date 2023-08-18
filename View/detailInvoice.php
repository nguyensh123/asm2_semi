<?php include('links.php') ?>

<body>

    <?php include('header.php') ?>
    <div class="container p-2 mb-3 ">
        <?php if($_SESSION["login"]==null){
            echo "Bạn cần đăng nhập để truy cập vào trang này! ";
            exit;
        }?>
        <?php if($invoice->getUser_name()!=$viewUserName): {
          echo "Hóa đơn không tồn tại!";
            exit;} ?>
            <?php else: ?>
        <h2 class=" text-center">Order Details</h2>
           
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
    <?php endif ?>
    <?php include('footer.php') ?>
</body>