<?php 
  require('../../Model/database.php');
  require('../../Model/user_db.php');
  require('../../Model/user.php');
  require('../../Model/product_db.php');
  require('../../Model/product.php');
  require('../../Model/brand_db.php');
  require('../../Model/brand.php');
  require('../../Model/cart.php');
  require('../../Model/invoice.php');
  require('../../Model/invoiceDB.php');
  require('../../Model/detail_db.php');
  require('../../Model/detailInvoice.php');
  require('../admin_model/contact.php');
  require('../admin_model/contactDB.php');
  session_start();
$product_DB = new ProductDB();
$user_DB = new AccountDB();
$brandDB = new BrandDB();
$invoice_DB = new InvoiceDB();
$detailDB = new DetailDB();
$contactDB = new ContactDB();

$listContact = $contactDB->getContacts();
$listUsers = $user_DB->getAccounts();
$listProduct = $product_DB->getProducts();
$listBrand = $brandDB->getBrands();
$invoices = $invoice_DB->getInvoices();
$action = filter_input(INPUT_GET, 'action');
if($action==null) $action = filter_input(INPUT_POST, 'action');
if($action=="search"){
  $search = filter_input(INPUT_GET, 'search');
  if(!isset($search)){$search="";}
  $listUsers = $user_DB->search($search);
}else if($action=="Delete"){
  $user_id = filter_input(INPUT_GET, 'id');
  $user_DB->delete($user_id);
  header('Location: ../View/user_management.php');
}else if($action=="Psearch"){
  $search = filter_input(INPUT_GET, 'Psearch');
  if(!isset($search)){$search="";}
  $listProduct = $product_DB->Psearch($search);
}else if($action=="addProduct"){
  $productName = filter_input(INPUT_POST, 'productName');
  $brandId = filter_input(INPUT_POST, 'brandId');
  $price = filter_input(INPUT_POST, 'price');
  $detail = filter_input(INPUT_POST, 'detail');
  $quantity = filter_input(INPUT_POST, 'quantity');
  $p = $product_DB->getProductByProductName($productName);
  if($p!=null){
    echo "Sản phẩm đã tồn tại nên không cần thêm mới!";
  }else{
    $brand = $brandDB ->getBrand($brandId);
    if($brand==null){
      echo "Mã số thương hiệu không chính xác!";
    }else{
      if($quantity<1){
        echo "Số lượng sản phẩm không chính xác!";
      }else{
      
// Kiểm tra xem biểu mẫu đã được gửi chưa
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Kiểm tra xem tệp đã được tải lên mà không có lỗi hay không
 if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
     $filename = $_FILES["photo"]["name"];
     $filetype = $_FILES["photo"]["type"];
     $filesize = $_FILES["photo"]["size"];
 
     // Xác minh phần mở rộng tệp
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(!array_key_exists($ext, $allowed)) die("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");
 
     // Xác minh kích thước tệp - tối đa 5MB
     $maxsize = 5 * 1024 * 1024;
     if($filesize > $maxsize) die("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");
 
     // Xác minh loại MIME của tệp
     if(in_array($filetype, $allowed)){
         // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
         if(file_exists("upload/" . $filename)){
             echo $filename . " đã tồn tại.";
         } else{
     //echo $_FILES["photo"]["tmp_name"];
     if(move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename)){ // có thể có lỗi
        
      $product_DB ->addProduct($productName,$filename,$brandId,$price,$detail,$quantity);
      echo "Đã thêm sản phẩm thành công!";

     }else{
       echo "Lỗi: không thể di chuyển tệp đến upload/";
     }
         } 
     } else{
         echo "Lỗi: Đã xảy ra sự cố khi tải tệp của bạn lên. Vui lòng thử lại."; 
     }
 } else{
     echo "Error: " . $_FILES["photo"]["error"];
 }
}
      }
    }
  }

}else if($action=="update_product"){
  $productName = filter_input(INPUT_POST, 'productName');
  $productID = filter_input(INPUT_POST, 'id');
  $brandId = filter_input(INPUT_POST, 'brandId');
  $price = filter_input(INPUT_POST, 'price');
  $detail = filter_input(INPUT_POST, 'detail');
  $quantity = filter_input(INPUT_POST, 'quantity');
  $p = $product_DB->getProductByProductName($productName);
  if(($p!=null)&& ($p->getProduct_id()) != $productID){
    echo "Sản phẩm đang tồn tại!";
    // header('Location: ../View/update_product.php?action=update&id='.$productID);
  }else{
    $brand = $brandDB ->getBrand($brandId);
    if($brand==null){
      echo "Mã số thương hiệu không chính xác!";
    }else{
      if($quantity<1){
        echo "Số lượng sản phẩm không hợp lệ!";
      }else{
      
// Kiểm tra xem biểu mẫu đã được gửi chưa
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Kiểm tra xem tệp đã được tải lên mà không có lỗi hay không
 if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
     $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
     $filename = $_FILES["photo"]["name"];
     $filetype = $_FILES["photo"]["type"];
     $filesize = $_FILES["photo"]["size"];
 
     // Xác minh phần mở rộng tệp
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if(!array_key_exists($ext, $allowed)) die("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");
     // Xác minh kích thước tệp - tối đa 5MB
     $maxsize = 5 * 1024 * 1024;
     if($filesize > $maxsize) die("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");
 
     // Xác minh loại MIME của tệp
     if(in_array($filetype, $allowed)){
         // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
         if(file_exists("upload/" . $filename) && ($p->getProduct_img())==$filename){
          $product_DB->updateProduct($productID,$productName,$filename,$brandId,$price,$detail,$quantity);
          echo "Đã update sản phẩm thành công!";
          header('Location: ../View/products.php');
         }else if(file_exists("upload/" . $filename)){  
          echo $filename . " đã tồn tại.";

      } 
          else{
     //echo $_FILES["photo"]["tmp_name"];
     if(move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename)){ // có thể có lỗi
      $product_DB->updateProduct($productID,$productName,$filename,$brandId,$price,$detail,$quantity);
      header('Location: ../View/products.php');

     }else{
       echo "Lỗi: không thể di chuyển tệp đến upload/";
     }
         } 
     } else{
         echo "Lỗi: Đã xảy ra sự cố khi tải tệp của bạn lên. Vui lòng thử lại."; 
     }
 } else{
     echo "Error: " . $_FILES["photo"]["error"];
 }
}
      }
    }
  }
}else if($action=="update"){
  $productID = filter_input(INPUT_GET, 'id');
  $p = $product_DB->getProduct($productID);

}else if($action=="deleteProduct"){
  $productID = filter_input(INPUT_GET, 'id');
  $product_DB->deleteProduct($productID);
  header('Location: ../View/products.php');
}else if($action=="deleteBrand"){
  $brandId = filter_input(INPUT_GET, 'id');
  $brandDB->deleteBrand($brandId);
  header('Location: ../View/ListBrand.php');
}else if($action=="addBrand"){
  $brandName = filter_input(INPUT_POST, 'brandName');
  if ($brandDB->getBrandByBrandName($brandName)!=null){
    $mess="Tên nhãn hàng đã tồn tại!";
  }else{
    $brandDB->addBrand($brandName);
    header('Location: ../View/ListBrand.php');
  }
}else if($action=="Bsearch"){
  $search = filter_input(INPUT_GET, 'Bsearch');
  $listBrand = $brandDB->Bsearch($search);
  if($search==null) $search=" ";
}else if($action=="updateBrand"){
  $brandID = filter_input(INPUT_POST, 'brandId');
  $brandName = filter_input(INPUT_POST, 'brandName');
  if ($brandDB->getBrandByBrandName($brandName)!=null){
    
    $mess="<h5 class='text-danger'>Tên nhãn hàng đã tồn tại!</h5>";
  }else{
    $brandDB->updateBrand($brandID,$brandName);
    header('Location: ListBrand.php');
  }
}else if($action=="detailInvoice"){
  $index = 0;
  $total = 0;
  $id = filter_input(INPUT_GET, 'id');
  $invoice = $invoice_DB->getInvoice($id);
  $time = strtotime($invoice->getInvoice_date());
 $details =$detailDB->getDetailsByInvoidId($id);
}else if($action=="Isearch"){
  $search = filter_input(INPUT_GET, 'Isearch');
  if($search==null) $search="";
  $invoices = $invoice_DB->Isearch($search); 
}else if($action=="ship"){
  $id = filter_input(INPUT_GET, 'id');
  $invoice_DB->updateStatus($id,"Đã giao hàng");
  header('Location: ../View/invoices.php');
}else if($action=="Csearch"){
  $search = filter_input(INPUT_GET, 'Csearch');
  if($search==null) $search="";
  $listContact = $contactDB->Csearch($search); 
}else if($action=="readContact"){
  $id = filter_input(INPUT_GET, 'id');
  $contactDB->updateStatus($id,"Đã đọc");
  header('Location: ../View/reContact.php');
}else if($action=="deleteContact"){
  $id = filter_input(INPUT_GET, 'id');
  $contactDB->deleteContact($id);
  header('Location: ../View/reContact.php');
}else if($action=="logoutAdmin"){
  $_SESSION["admin"] = null;
  header('Location: ../../View/index.php');
}
?>