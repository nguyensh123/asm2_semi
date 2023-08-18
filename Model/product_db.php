<?php 
    class ProductDB{
        public  function getProduct($product_id) {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                      WHERE product_id = :product_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_id", $product_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            if($row==null){return null;}

            $product = new Product();
            $product->setProduct_id($row['product_id']);
            $product->setProduct_name($row['product_name']);
            $product->setProduct_img($row['img_product']);
            $product->setBrand_id($row['brand_id']);
            $product->setPrice($row['price']);
            $product->setProduct_detail($row['product_detail']);
            $product->setquantity($row['quantity']);
            $product->setProduct_date($row['Product_date(date)']);
            $product->setProduct_view($row['Product_view']);
            $product->setNumberOfSale($row['numberOfSale']);
            return $product;
        }

        public  function getProductByProductName($product_name) {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                      WHERE product_name = :product_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_name", $product_name);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            if($row==null) return null;

            $product = new Product();
            $product->setProduct_id($row['product_id']);
            $product->setProduct_name($row['product_name']);
            $product->setProduct_img($row['img_product']);
            $product->setBrand_id($row['brand_id']);
            $product->setPrice($row['price']);
            $product->setProduct_detail($row['product_detail']);
            $product->setquantity($row['quantity']);
            $product->setProduct_date($row['Product_date(date)']);
            $product->setProduct_view($row['Product_view']);
            $product->setNumberOfSale($row['numberOfSale']);
            return $product;
        }

        public  function getProducts() {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                        Order by product_id DESC';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }
        
        public  function getProductsByView() {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                        ORDER BY Product_view DESC 
                        LIMIT 5';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function getProductsByNumberOfSales() {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                        ORDER BY numberOfSale DESC 
                        LIMIT 5';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function getProductsByDate() {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                        ORDER BY product_id DESC
                        LIMIT 5';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function getProductsByBrandId($brand_id) {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                        Where Brand_id = :brand_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":brand_id", $brand_id);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function updateView($product_id,$view) {
            $db = Database::getDB();
            global $productDB;
            $query = 'UPDATE products
                        SET Product_view = :view
                        Where product_id = :product_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_id", $product_id);
            $statement->bindValue(":view", $view);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function search($search,$brand_id) {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                        Where product_name Like "%":search"%" 
                        And Brand_id = :brand_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":search", $search);
            $statement->bindValue(":brand_id", $brand_id);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function updateQty($product_id,$qty,$numberOfSale) {
            $db = Database::getDB();
            global $productDB;
            $query = 'UPDATE products
                        SET quantity = :qty,
                            numberOfSale = :numberOfSale
                        Where product_id = :product_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_id", $product_id);
            $statement->bindValue(":qty", $qty);
            $statement->bindValue(":numberOfSale", $numberOfSale);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function getQuantityByProductName($productName) {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT quantity FROM products
                      WHERE product_name = :product_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_name", $productName);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            if(COUNT($row)<1) {return null;}
            return $row;
        }

        public  function Psearch($search) {
            $db = Database::getDB();
            global $productDB;
            $query = 'SELECT * FROM products
                        Where product_id Like "%":search"%" 
                        Or product_name Like "%":search"%"
                        or brand_id Like "%":search"%"
                        or price Like "%":search"%"
                        or product_detail Like "%":search"%"';
            $statement = $db->prepare($query);
            $statement->bindValue(":search", $search);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }


        public  function addProduct($product_name,$img,$brand_id,$price,$detail,$quantity) {
            $db = Database::getDB();
            global $productDB;
            $query = 'INSERT INTO `products`(`product_name`, `img_product`, `brand_id`, `price`, `product_detail`, `quantity`) 
            VALUES (:product_name,:img,:brand_id,:price,:detail,:quantity)';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_name", $product_name);
            $statement->bindValue(":img", $img);
            $statement->bindValue(":brand_id", $brand_id);
            $statement->bindValue(":price", $price);
            $statement->bindValue(":detail", $detail);
            $statement->bindValue(":quantity", $quantity);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function updateProduct($product_id,$product_name,$img,$brand_id,$price,$product_detail,$qty) {
            $db = Database::getDB();
            global $productDB;
            $query = ' UPDATE `products` SET `product_name`= :product_name,
            `img_product`=:img,`brand_id`=:brand_id,`price`=:price,
            `product_detail`=:product_detail, `quantity`=:qty
            WHERE product_id = :product_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_id", $product_id);
            $statement->bindValue(":product_name", $product_name);
            $statement->bindValue(":img", $img);
            $statement->bindValue(":brand_id", $brand_id);
            $statement->bindValue(":price", $price);
            $statement->bindValue(":product_detail", $product_detail);
            $statement->bindValue(":qty", $qty);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function deleteProduct($product_id) {
            $db = Database::getDB();
            global $productDB;
            $query = 'DELETE FROM `products`
            WHERE product_id = :product_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":product_id", $product_id);
            $statement->execute();
            $statement->closeCursor();
        }
       
    }
?>