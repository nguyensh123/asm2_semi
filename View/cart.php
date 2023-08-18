<?php include('links.php') ?>
<body>
    <?php include('header.php');
     ?>
    <div class="container mt-3 mb-3 p-3">

        <div class="row ml-0">
            <h2 >Cart</h2>
        <i class="fa-solid text-primary fa-cart-shopping"></i>
        </div>
        <?php if (count($cart) == 0) : ?>
            <h3 class="text-danger">You have no items in your shopping cart!</h3>
            <img src="https://bizweb.dktcdn.net/100/411/922/themes/800986/assets/empty-cart.png?1607914671664" >
        <?php else: ?>
          <form action="../Controller/controller.php" method="post">
        <table class="table">
        
  <thead class="bg-dark text-light">
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
        <input type="hidden" name="action" value="update_qty">
        <input type="number" value="<?php echo $item['qty']; ?>" name="newqty[<?php echo $key; ?>]" class="inline" style="width: 50px;"> 
        <button type="submit" class="btn btn-dark p-0">Update</button>
    
</div>
    </td>
      <td><?php echo $total." VND" ?></td>
      <td><a href="../Controller/controller.php?action=deleteItem&key=<?php echo $key ?>"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</form>
      <h5 class="text-right text-danger">Total: <?php echo number_format(murach\cart\get_subtotal($cart)) ?> VND</h5>
    <div class="row mt-4">
      <div class="mx-auto"><form action="" method="post"><input type="hidden" name="action" value="loginFalse">
      <a href="product_list.php">
        <button type="button" class="btn btn-primary ">Continue </button></a>
        <?php if(isset($_SESSION['login']) &&  ($_SESSION['login']!= null) ) : ?><a href="pay.php">
        <button type="button" class="btn btn-primary" >
        Buy
      </button></a>
      <?php else: ?>
        
        <button type="submit" class="btn btn-primary">
        Buying
      </button>
      <?php endif; ?>
      </div>
    </div></form>
   
    <?php endif; ?>
    </div>
    
    <?php include('footer.php') ?>
</body>