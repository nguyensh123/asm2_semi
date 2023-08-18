<?php include('links.php') ?>
<body>
    <?php include('header.php');
     ?>
    <div class="container mt-3 mb-3 p-3">

        <div class="row ml-0">
            <h2 >Thanh toán</h2>
       </div>
        <?php if (count($cart) == 0) : ?>
            <h3 class="text-danger">You have no items in your shopping cart!</h3>
            <img src="https://bizweb.dktcdn.net/100/411/922/themes/800986/assets/empty-cart.png?1607914671664" >
        <?php else: ?>
            <form action="../Controller/controller.php" method="post">
            <h5 class="">Recipient's name: <?php echo $viewFullName;?></h5>
          <h5 class="">Order address:
          <input type="text" name="address" required class="border" value="<?php echo $viewAddress;?>"> </h5>
        <table class="table">
        
  <thead class="bg-dark text-light">
    <tr>
      <th class="col-1">#</th>
      <th class="col-4">Produt Name</th>
      <th class="col-2">Price</th>
      <th class="col-2">Value</th>
      <th class="col-2">Total</th>
    </tr>
  </thead>
  <tbody class="border-bottom">
  <?php foreach( $cart as $key => $item ) :
                    $price  = number_format($item['price']);
                    $total = number_format($item['total']);
                    $index +=1;
                ?>
    <tr>
   
        <input type="hidden" name="key" value="<?php echo $key ?>">
      <th ><?php echo $index ?></th>
      <td><?php echo $item['name']; ?></td>
      <td><?php echo $price." VND" ?></td>
      <td>
        <div class="input-group">        
        <p class="mx-auto"><?php echo  $item['qty']; ?></p>
    
</div>
    </td>
      <td><?php echo $total." VND" ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
        <h5 class="ml-3   ">Total: <?php echo number_format(murach\cart\get_subtotal($cart),0,'.',' ')." VND" ?></h5>
        <input type="hidden" name="shipCode" value="<?php echo count($cart)*15000; ?>">
      <h5 class="ml-3   ">Shipping fee: <?php echo number_format(count($cart)*15000,0,'.',' ')." VND" ?></h5>
      <h4 class="ml-3  text-danger ">The amount paid: <?php echo number_format(murach\cart\get_subtotal($cart)+count($cart)*15000,0,'.',' ')." VND" ?></h4>
    <div class="row mt-4">
      <div class="mx-auto"> <input type="hidden" name="action" value="loginFalse">
      <a href="cart.php">
        <button type="button" class="btn btn-primary "> To Cart</button></a>
        <?php if ($_SESSION['login']!= null) : ?>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Pay
      </button>
      <?php else: ?>
        <button type="submit" class="btn btn-primary">
        Buying
      </button>
      <?php endif; ?>
      </div>
    </div>
    <div class="modal fade" id="myModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">confirm password</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
         <div class="form-group">
                    <label>password:</label>
                    <input type="password" required  class="form-control" name="pass" >
                  </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
           <input type="submit" name="action" value="Xác nhận" class="btn btn-danger">
         </div>
         </form>
      </div>
   </div> 
</div>
    <?php endif; ?>
    </div>
    
    <?php include('footer.php') ?>
</body>