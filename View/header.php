<div class="container">
  <!-- As a link --> 
  <nav class="navbar navbar-light bg-light">
    <div class="row ">
      <div class="col-12 col-lg-4 mr-auto">
        <img src="https://cdn.haitrieu.com/wp-content/uploads/2021/11/Logo-The-Gioi-Di-Dong-MWG-Y-H.png" width="100%"
          height="80px">
      </div>
      <div class="col-8 col-lg-6 " style="padding: 30px;">
      <form action="" method="get">
      <input type="hidden" name="action" value="search">
        <div class="input-group">
          <input type="search" class="form-control rounded" required placeholder="Search" aria-label="Search" name="search"
            aria-describedby="search-addon" />
          <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
      </div>
      </form>
      <div class="col-2 col-lg-1 mx-auto" style="padding: 40px 30px 30px 0px;">
        <a href="cart.php"><i class="fa-solid fa-cart-shopping">Cart</i></a>
      </div>
      <div class="col-2 col-lg-1" style="padding: 30px 30px 30px 0px;">

        <?php if (!isset($_SESSION["login"])) {
          $login ='<button class="btn btn-outline-primary" type="button" class="btn" data-toggle="modal"
          data-target="#exampleModal">Login</button>'; 
            echo $login;
          } else {
            $login='<a href="account.php"><i class="fa fa-address-card ml-3" aria-hidden="true" style="font-size:35px;"></i></a>';
            echo $login;
          };
          ?>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="" method="post">
                  <input type="hidden" name="action" value="login">
                <div class="modal-body">
                  <div class="form-group">
                    <label>userName:</label>
                    <input type="text" required  class="form-control" name="userName" aria-describedby="helpId" >
                  </div>
                  <div class="form-group">
                    <label for="">password</label>
                    <input type="password" required  class="form-control" name="password" >
                  </div>
                </div>

                <div class="modal-footer">
                  <a href="register.php">Sign Up</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
                </form>
              </div>
            </div>
          </div>

        </div>

      </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item " style="margin-right: 50px;">
            <a class="nav-link text-uppercase" href="index.php">Home page</a>
          </li>

          <li class="nav-item" style="margin-right: 50px;">
            <a class="nav-link text-uppercase" href="product_list.php">Product</a>
          </li>
          <li class="nav-item" style="margin-right: 50px;">
            <a class="nav-link text-uppercase" href="cart.php">Cart</a>
          </li>
          <li class="nav-item" style="margin-right: 50px;">
            <a class="nav-link text-uppercase" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </nav>

  </div>
      <?php 
       if (isset($_SESSION['mess'])):?>
       <div class="container">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
       <?php echo $_SESSION['mess']; ?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <?php
  $_SESSION['mess']=null;
  ?></div>
  <?php endif;?>
          