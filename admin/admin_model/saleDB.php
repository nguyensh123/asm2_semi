<?php 
    class SaleDB{
        public  function getSales() {
            $db = Database::getDB();
            $query = 'SELECT * FROM sales';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            return $rows;
        }

        public  function getRevenue() {
            $db = Database::getDB();
            $query = 'SELECT Sum(amount) FROM sales';
            $statement = $db->prepare($query);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();

            return $row;
        }

        public  function getSaleByPName($productName) {
            $db = Database::getDB();
            $query = 'SELECT  * FROM sales
                        WHERE productName=:productName';
            $statement = $db->prepare($query);
            $statement->bindValue(":productName", $productName);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();

            return $row;
        }

        public  function addSale($productName,$brand,$price,$numberOfSale,$amount) {
            $db = Database::getDB();
            $query = 'INSERT INTO sales
            VALUES (:productName,:brand,:price,:numberOfSale,:amount);';
            $statement = $db->prepare($query);
            $statement->bindValue(":productName", $productName);
            $statement->bindValue(":brand", $brand);
            $statement->bindValue(":price", $price);
            $statement->bindValue(":numberOfSale", $numberOfSale);
            $statement->bindValue(":amount", $amount);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function updateSale($productName,$numberOfSale,$amount) {
            $db = Database::getDB();
            $query = 'UPDATE `sales` SET`numberOfSale`=:numberOfSale,`amount`=:amount
            WHERE productName=:productName';
            $statement = $db->prepare($query);
            $statement->bindValue(":productName", $productName);
            $statement->bindValue(":numberOfSale", $numberOfSale);
            $statement->bindValue(":amount", $amount);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function deleteSale() {
            $db = Database::getDB();
            global $productDB;
            $query = 'DELETE FROM `sales`
            WHERE numberOfSale = 0';
            $statement = $db->prepare($query);
            $statement->execute();
            $statement->closeCursor();
        }
    }
?>