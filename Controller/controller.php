<?php 
  require('../Model/database.php');
  require('../Model/user_db.php');
  require('../Model/user.php');
  require('../Model/product_db.php');
  require('../Model/product.php');
  require('../Model/brand_db.php');
  require('../Model/brand.php');
  require('../Model/cart.php');
  require('../Model/invoice.php');
  require('../Model/invoiceDB.php');
  require('../Model/detail_db.php');
  require('../Model/detailInvoice.php');
  require('../admin/admin_model/contact.php');
  require('../admin/admin_model/contactDB.php');
session_start();
  $accountDB = new AccountDB();
  $productDB = new ProductDB();
  $invoiceDB = new InvoiceDB();
  $detailDB = new DetailDB();
  $ContactDB = new ContactDB();
  $action = filter_input(INPUT_GET, 'action');
  if($action==null) $action = filter_input(INPUT_POST, 'action');
  $index=0;
  if (empty($_SESSION['cart13'])) {
    $cart = array();
    } else {
    $cart = $_SESSION['cart13'];
    }

  $search = filter_input(INPUT_GET, 'search');
  if(isset($_SESSION["login"]) && ($_SESSION["login"] != null) && ($accountDB->getAccount_by_userName($_SESSION["login"]))!=null){
    $viewUserName =  $accountDB->getAccount_by_userName($_SESSION["login"])->getUserName();
    $viewFullName =  $accountDB->getAccount_by_userName($_SESSION["login"])->getFullName();
    $viewEmail =  $accountDB->getAccount_by_userName($_SESSION["login"])->getEmail();
    $viewAmount =  $accountDB->getAccount_by_userName($_SESSION["login"])->getAmount();
    $viewAddress =  $accountDB->getAccount_by_userName($_SESSION["login"])->getAddress();
    $invoices = $invoiceDB->getInvoiceByUser_name($viewUserName);
  }

  $brand_db = new BrandDB();

  if($action=="login"){
    $userName = filter_input(INPUT_POST, 'userName');
    $password = filter_input(INPUT_POST, 'password');

    if($accountDB->getAccount_by_userName($userName) != null){
        if($accountDB->getAccount_by_userName($userName)->getPassword() == $password){
          if($accountDB->getAccount_by_userName($userName)->getPosition() == "admin"){
            $_SESSION["admin"] = $userName;
            $session_id = session_id();
            header('Location: ../admin/View/dashboard.php?session_id='.$session_id);
          }else{
          $_SESSION["login"] = $userName;}
        }
        else {
          $message = "<h1 class='text-danger'>Mật khẩu không chính xác!</h1>";
          $_SESSION['mess']=$message;
        }
      } else {
        $message = "<h1 class='text-danger'>Tên tài khoản không chính xác!</h1>";
          $_SESSION['mess']=$message;
      }
    } else if($action=="logout"){
      $_SESSION["login"] = null;
    } else if($action=="register"){
      $userName = filter_input(INPUT_POST, 'userName');
      $password = filter_input(INPUT_POST, 'password');
      $re_password = filter_input(INPUT_POST, 're_password');
      $address = filter_input(INPUT_POST, 'address');
      $fullName = filter_input(INPUT_POST, 'fullName');
      $email = filter_input(INPUT_POST, 'email');

      if($accountDB->getAccount_by_userName($userName) != null){
        $message = "<h5 class='text-danger'>Tài khoản đã tồn tại!</h5>";
        $_SESSION['mess']=$message;
      } else {
        if($password == $re_password){
        $accountDB->insertUser($userName,$password,$fullName,$email,$address);
        $_SESSION["login"] = $userName;
        header('Location: ../View/');
      } else{
        $message = "<h5 class='text-danger'>Mật khẩu không trùng khớp!</h5>";
        $_SESSION['mess']=$message;
      }
    }
  }else if($action=="detail"){
    $brandDB = new BrandDB();
    $product_id = filter_input(INPUT_GET, 'productId');
    $product = $productDB->getProduct($product_id);
    $product_img = $product->getProduct_img();
    $product_name = $product->getProduct_name();
    $brand_id = $product->getBrand_id();
    $product_detail = $product->getProduct_detail();
    $price = $product->getPrice();
    $quantity = $product->getQuantity();
    $brand_name = $brandDB->getBrand($brand_id)->getBrandName();
    $view = $product->getProduct_view();
    $productDB->updateView($product_id,$view+1);
  }else if($action=="search"){
      header('Location: product_list.php?search='.$search);
  }else if($action=="addToCart"){
        
        $key = filter_input(INPUT_POST, 'product_id');
        $p = $productDB->getProduct($key);
        $quantity = filter_input(INPUT_POST, 'quantity');
        if($quantity>$p->getQuantity()){
          $message = "<h2 class='text-danger'>The number of products in stock is not enough!</h2>";
          $_SESSION['mess']=$message;
          header('Location: ../View/detail.php?action=detail&productId='.$key);
        }else{
        murach\cart\add_item( $cart , $key , $quantity );
        $_SESSION['cart13'] = $cart;
        header('Location: ../View/cart.php');
      }
  }else if($action=="update_qty"){
    $new_qty_list = filter_input(INPUT_POST, 'newqty', 
                FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
          $p = $productDB->getProduct($key);
          if($qty>$p->getQuantity()){
            $message = "<h2 class='text-danger'>".$p->getProduct_name()." not enough in stock!</h2>
             Only left in stock ".$p->getQuantity()." product(s)";
            $_SESSION['mess']=$message;
            header('Location: ../View/cart.php');
          }else if ($cart[$key]['qty'] != $qty) {
                murach\cart\update_item($cart, $key, $qty);
                }
        }
    if($_SESSION['mess']==null){
    $_SESSION['cart13'] = $cart;
    $message = "<h2 class='text-danger'>You have updated your order!</h2>";
    $_SESSION['mess']=$message;
    header('Location: ../View/cart.php');}
  }else if($action=="deleteItem"){
    $key = filter_input(INPUT_GET, 'key');
    murach\cart\update_item($cart, $key, 0);
    $_SESSION['cart13'] = $cart;
    $message = "<h2 class='text-danger'>You have deleted your order!</h2>";
    $_SESSION['mess']=$message;
    header('Location: ../View/cart.php');
  }else if($action=="update_user"){
    $pass = filter_input(INPUT_POST, 'pass');
    $userName = filter_input(INPUT_POST, 'user_name_ud');
    if($accountDB->getAccount_by_userName($userName)->getPassword() == $pass){
      $fullName = filter_input(INPUT_POST, 'full_name_ud');
      $address = filter_input(INPUT_POST, 'address_ud');
      $email = filter_input(INPUT_POST, 'email_ud');
      $accountDB->updateAccount($userName,$fullName,$email,$address);
      $message = "<h1 class='text-danger'>Information has been changed!</h1>";
      $_SESSION['mess']=$message;
       header('Location: ../View/account.php');
  }else {
    $message = "<h1 class='text-danger'>Incorrect passwordc!</h1>";
      $_SESSION['mess']=$message;
      header('Location: ../View/update_account.php');
  }
}else if($action=="changePassword"){
      $pass = filter_input(INPUT_POST, 'pass');
      if($pass!=$accountDB->getAccount_by_userName($_SESSION["login"])->getPassword()){
        $message = "<p class='text-danger'>Incorrect password!</p>";
       $_SESSION['mess']=$message;
       header('Location: ../View/update_password.php');
      }else{
      $newPass = filter_input(INPUT_POST, 'newPass');
      $reNewPass = filter_input(INPUT_POST, 'reNewPass');
      if($newPass!=$reNewPass){
        $message = "<h1 class='text-danger'>Password does not match!</h1>";
        $_SESSION['mess']=$message;
        header('Location: ../View/update_password.php');
      }else {
        $accountDB->updatePassword($viewUserName,$newPass);
        $message = "<h1 class='text-danger'>Information has been changed!</h1>";
        $_SESSION['mess']=$message;
        header('Location: ../View/account.php');
      }
      }
}else if($action=="deposit"){
  $pass = filter_input(INPUT_POST, 'pass');
  if($pass!=$accountDB->getAccount_by_userName($_SESSION["login"])->getPassword()){
    $message = "<h1 class='text-danger'>Incorrect password!</h1>";
   $_SESSION['mess']=$message;
  }else{
    $money = (int) filter_input(INPUT_POST, 'money');
    $amountUd = $viewAmount + $money;
    $accountDB->updateAmount($viewUserName,$amountUd);
    $message = "<h1 class='text-danger'>Thông tin đã được thay đổi!</h1>";
    $_SESSION['mess']=$message;
    header('Location: account.php');
  }
}else if($action=="Xác nhận"){
  $pass = filter_input(INPUT_POST, 'pass');
  if($pass!=$accountDB->getAccount_by_userName($_SESSION["login"])->getPassword()){
    $message = "<h1 class='text-danger'>Information has been changed!</h1>";  
    $_SESSION['mess']=$message;
    header('Location: ../View/pay.php');
  }else{
    $amount= $accountDB->getAccount_by_userName($_SESSION["login"])->getAmount();
    if ($amount<murach\cart\get_subtotal($cart)){
      $message = "<h2 class='text-danger'>The amount in the account is not enough to make the transaction!</h2>
                  <p>Please top up to continue paying.</p>";
      $_SESSION['mess']=$message;
      header('Location: ../View/pay.php');
    }else{
      $address = filter_input(INPUT_POST, 'address');
      $shipCode = filter_input(INPUT_POST, 'shipCode');
      $invoiceDB->insertInvoice($viewUserName,Count($cart),murach\cart\get_subtotal($cart)+$shipCode,$address,$shipCode);
      $amountUd = $viewAmount - (int) murach\cart\get_subtotal($cart);
      $accountDB->updateAmount($viewUserName,$amountUd);
      $invoiceNew = $invoiceDB->getInvoiceNew();
      $invoiceId = $invoiceNew->getInvoice_id();
      
      foreach ($cart as $key => $value) {
        $brand_id = $value['brandId'];
        $product_qty = $productDB->getProduct($key)->getQuantity();
        $product_sale = $productDB->getProduct($key)->getNumberOfSale();
        $productDB->updateQty($key,$product_qty-$value['qty'],$product_sale+$value['qty']);
        $productName = $productDB->getProduct($key)->getProduct_name();
        $brand_name = $brand_db->getBrand($brand_id)->getBrandName();
        $detailDB->insertDetail($invoiceId,$productName,$brand_name,$value['price'] ,$value['qty']);
      }
      $_SESSION['cart13'] = null;
      $message = "<h1 class='text-danger'>Payment success!</h1>
      <p>You have successfully paid for the transaction. Your order will be delivered to your home soon.</p>";
      $_SESSION['mess']=$message;
      header('Location: ../View/detailInvoice.php?action=detailInvoice&invoiceId='.$invoiceId);
    }
  }
}else if($action=="loginFalse"){
  $message = "<h2 class='text-danger'>You need to login to pay!</h2>";
  $_SESSION['mess']=$message;
}else if($action=="detailInvoice"){
  $invoiceId = filter_input(INPUT_GET, 'invoiceId');
  $invoice = $invoiceDB->getInvoice($invoiceId);
  $details = $detailDB->getDetailsByInvoidId($invoiceId);
  $total=0;
  $time = strtotime($invoice->getInvoice_date());
}else if($action=="cancelOrder"){
  $invoiceId = filter_input(INPUT_GET, 'id');
  $invoiceDB->updateStatus($invoiceId,"Đã hủy đơn");
  $invoice = $invoiceDB->getInvoice($invoiceId);
  $accountDB->updateAmount($viewUserName,$viewAmount+$invoice->getInvoice_total());
  $details=$detailDB->getDetailsByInvoidId($invoiceId);
  foreach ($details as $key => $value) {
    $qtyP= $productDB->getQuantityByProductName($value['product_name']);
    $saleP = $productDB->getProductByProductName($value['product_name'])->getNumberOfSale();
    $pID = $productDB->getProductByProductName($value['product_name'])->getProduct_Id();
    $pPrice= $productDB->getProductByProductName($value['product_name'])->getPrice();
    $productDB->updateQty($pID,$qtyP['quantity']+$value['quantity'],$saleP-$value['quantity']);
  }
  $message = "<h3 class='text-danger'>You have successfully cancel orders!</h3>";
  $_SESSION['mess']=$message;
  header('Location: ../View/account.php');
}else if($action=="Send your message!"){
  $fullName = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email');
  $mess = filter_input(INPUT_POST, 'message');
  $ContactDB->addContact($fullName,$email,$mess);
  $message = "<h3 class='text-danger'>You have responded successfully!</h3>";
  $_SESSION['mess']=$message;
  header('Location: ../View/contact.php');
}

?>