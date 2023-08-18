<?php include('links.php') ?>

<body>
    <?php 
    include('header.php');
    include('banner.php');
    ?>
    <div class="container mt-3 mb-3 p-3">
        <div class="row p-3">
        <form action="../Controller/controller.php" method="post">
            <div class="col-12 col-xl-8 col-lg-8">
                <div class="row ">
                    <div class="col-sm-5 col-xl-5 col-12 mb-3 pl-0">
                        <img src="../admin/controller/upload/<?php echo $product_img ?>" class="mx-auto d-block shadow">
                    </div>
                    
                    <div class="col-sm-6 col-xl-6 col-12-pr-3 ml-4 p-0">
                        <div class="row"><h2><?php echo $product_name ?></h2></div>
                        <div class="row">
                            <?php echo $product_detail?>
                        </div>
                        <input type="hidden" name="action" value="addToCart">
                        <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                        <div class="row mt-2"> Brand Name:    <?php echo $brand_name ?></div>
                        <div class="row mt-2"> View:    <?php echo $view+1 ?></div>
                        <div class="row mt-2">Price:    <?php echo number_format($price) . " VND" ?></div>
                        <div class="row mt-2">Quantity:   <?php echo $quantity ?></div>
                        <div class="row mt-2 form-group">
                            <input type="number" style="width: 20%;text-align: right;" min="1" name="quantity" value="1" max="<?php echo $quantity ?>" >
                            <button type="submit" class="btn btn-danger">Buy</button>
                        </div>
                    </div>
                </div>

                </form>

                <div class="row bg-primary">
                    <h3 class="ml-3">Product Details</h1>
                </div>
            </div>
            <div class="col-xl-4 d-none d-xl-block">

            </div>
        </div>

    </div>
    <?php include('footer.php') ?>
</body>