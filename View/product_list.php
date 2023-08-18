<?php 
include('links.php');
$check = false;
?>

<body>
  <?php 
  include('header.php');
  include('banner.php');
  ?>
  <?php foreach ($brand_db->getBrands() as $key => $value): {
    $brandName = $value['Brand_name']; 
    $brandId = $value['Brand_id'];
  } ?>
  <?php if($productDB->getProductsByBrandId($brandId)!=null):
  ?>
    <?php $products = $productDB->getProductsByBrandId($brandId);
  if($search!=null){
    $products = $productDB->search($search,$brandId);
  } ?>
  <?php if(Count($products)>0):?>
  <div class="container">
    <div class="row"
      style=" height: 50px;background-color: rgb(197, 193, 193);width: 100%;margin-left: 0px;margin-bottom: 10px;margin-top: 10px;">

      <h3 style="margin-top: 8px;margin-left: 10px;">
        <?php echo $brandName;$check=true; ?>
      </h3>
    </div>
  </div>
  <?php endif; ?>
  <div class="container">
  
    <div class="row group-content" style="margin: 0px;">
      <?php foreach ($products as $key => $value): {
        $product_name = $value['product_name'];
        $product_price = $value['price'];
        $product_image=$value['img_product'];
        $productId=$value['product_id'];
      } ?>
      <div class="col-12 col-md-4 col-xl-4">

        <div class="shadow"
          style="margin-top: 20px;margin-bottom: 20px;padding-top: 20px;padding-bottom: 20px;width: 90%;">
          <div class="row">
            <img src="../admin/controller/upload/<?php echo $product_image ?>" class="mx-auto">
          </div>
          <div class="text-center font-weight-bold" style="margin-top: 10px;">
            <?php echo $product_name ?>
          </div>
          <div class="text-center text-danger" style="margin-top: 10px;">
            <h5>
              <?php echo number_format($product_price) . "VND"?>
            </h5>
          </div>
          <div class="text-center " style="margin-top: 10px;"> <a href="detail.php?action=detail&productId=<?php echo $productId?>" class="text-decoration-none "> <button
                class="btn bg-info text-light  shadow">Details</button></a></div>
        </div>
       
      </div>
      <?php endforeach; ?>
    </div>


  </div>
  <?php endif; ?>
  <?php endforeach; ?>
    
  <?php if($check==false):?>
    <div class="container mt-3 mb-3" style="height:300px">
      <h3 class=" m-3 text-danger">No products on request!</h3>
    </div>
    <?php endif ?>
  <?php 
 include('footer.php')
 ?>
</body>

</html>