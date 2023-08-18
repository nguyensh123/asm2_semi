<?php 
include('links.php');
?>
<body>
  <?php 
  include('header.php');
  include('banner.php');
  ?>
     
       
  <div class="container">
    <div class="row"
      style=" height: 50px;background-color: rgb(197, 193, 193);width: 100%;margin-left: 0px;margin-bottom: 10px;margin-top: 10px;">
      <h3 style="margin-top: 8px;margin-left: 10px;">POPULAR PROCUCT</h3>
    </div>
  </div>
  <div class="container">
    <div class="row group-content" style="margin: 0px;">
    <?php foreach ($productDB->getProductsByView() as $key => $value):
                {
                # code...
                $productId = $value['product_id'];
                $product_img=$value['img_product'];
                $detail=$value['product_detail'];
                $product_name=$value['product_name'];
                $price=$value['price'];
              }?>
      <div class="col-12 col-md-4 col-xl-4">
        <div class="shadow"
          style="margin-top: 20px;margin-bottom: 20px;padding-top: 20px;padding-bottom: 20px;width: 90%;">
          <div class="row">
            <img src="../admin/controller/upload/<?php echo $product_img?>" class="mx-auto">
          </div>
          <div class="text-center font-weight-bold" style="margin-top: 10px;"> <?php echo $product_name?></div>
          <div class="text-center text-danger" style="margin-top: 10px;">
            <h5><?php echo number_format($price). " VND"; ?> </h5>
          </div>
          <div class="text-center " style="margin-top: 10px;"> <a href="detail.php?action=detail&productId=<?php echo $productId?>" class="text-decoration-none "> <button
                class="btn bg-info text-light  shadow">Details</button></a></div>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>

  <div class="container">
    <div class="row"
      style=" height: 50px;background-color: rgb(197, 193, 193);width: 100%;margin-left: 0px;margin-bottom: 10px;margin-top: 10px;">
      <h3 style="margin-top: 8px;margin-left: 10px;">NEW PRODUCT</h3>
    </div>
  </div>

  <div class="container" style="margin-bottom: 10px;">
    <div class="row group-content" style="margin: 0px;">
    <?php foreach ($productDB->getProductsByDate() as $key => $value):
                {
                # code...
                $productId = $value['product_id'];
                $product_img=$value['img_product'];
                $detail=$value['product_detail'];
                $product_name=$value['product_name'];
                $price=$value['price'];
              }?>
      <div class="col-12 col-md-4 col-xl-4">
        <div class="shadow"
          style="margin-top: 20px;margin-bottom: 20px;padding-top: 20px;padding-bottom: 20px;width: 90%;">
          <div class="row">
            <img src="../admin/controller/upload/<?php echo $product_img?>" class="mx-auto">
          </div>
          <div class="text-center font-weight-bold" style="margin-top: 10px;"> <?php echo $product_name?></div>
          <div class="text-center text-danger" style="margin-top: 10px;">
            <h5><?php echo number_format($price). " VND"; ?> </h5>
          </div>
          <div class="text-center " style="margin-top: 10px;"> <a href="detail.php?action=detail&productId=<?php echo $productId?>" class="text-decoration-none "> <button
                class="btn bg-info text-light  shadow">details</button></a></div>
        </div>
      </div>
    <?php endforeach; ?>
      </div>
    </div>

    <div class="container">
    <div class="row"
      style=" height: 50px;background-color: rgb(197, 193, 193);width: 100%;margin-left: 0px;margin-bottom: 10px;margin-top: 10px;">
      <h3 style="margin-top: 8px;margin-left: 10px;">TOP SELLER</h3>
    </div>
  </div>

  </div>
  <div class="container" style="margin-bottom: 10px;">
    <div class="row group-content" style="margin: 0px;">
    <?php foreach ($productDB->getProductsByNumberOfSales() as $key => $value):
                {
                # code...
                $productId = $value['product_id'];
                $product_img=$value['img_product'];
                $detail=$value['product_detail'];
                $product_name=$value['product_name'];
                $price=$value['price'];
              }?>
      <div class="col-12 col-md-4 col-xl-4">
        <div class="shadow"
          style="margin-top: 20px;margin-bottom: 20px;padding-top: 20px;padding-bottom: 20px;width: 90%;">
          <div class="row">
            <img src="../admin/controller/upload/<?php echo $product_img?>" class="mx-auto">
          </div>
          <div class="text-center font-weight-bold" style="margin-top: 10px;"> <?php echo $product_name?></div>
          <div class="text-center text-danger" style="margin-top: 10px;">
            <h5><?php echo number_format($price). " VND"; ?> </h5>
          </div>
          <div class="text-center " style="margin-top: 10px;"> <a href="detail.php?action=detail&productId=<?php echo $productId?>" class="text-decoration-none "> <button
                class="btn bg-info text-light  shadow">Detail</button></a></div>
        </div>
      </div>
    <?php endforeach; ?>
      </div>
    </div>

 <?php 
 include('footer.php')
 ?>
</body>

</html>