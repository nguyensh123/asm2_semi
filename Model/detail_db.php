<?php 
    class DetailDB{
        public  function getDetailsByInvoidId($invoice_id) {
            $db = Database::getDB();
            global $detailDB;
            $query = 'SELECT * FROM detail
                      WHERE invoice_id = :invoice_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":invoice_id", $invoice_id);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            return $rows;
        }
        
        public  function insertDetail($invoice_id ,$product_name,$brand_name,$price ,$quantity) {
            $db = Database::getDB();
            global $detailDB;
            $query = 'INSERT INTO detail(invoice_id ,product_name,brand_name,price ,quantity)
                        Values (:invoice_id, :product_name, :brand_name, :price, :quantity)';
            $statement = $db->prepare($query);
            $statement->bindValue(":invoice_id", $invoice_id);
            $statement->bindValue(":product_name", $product_name);
            $statement->bindValue(":brand_name", $brand_name);
            $statement->bindValue(":price", $price);
            $statement->bindValue(":quantity", $quantity);
            $statement->execute();

        }
        

    }
?>