<?php 
    class BrandDB{
        public  function getBrand($brand_id) {
            $db = Database::getDB();
            $query = 'SELECT * FROM brands
                      WHERE Brand_id = :brand_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":brand_id", $brand_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
            if($row==null){
                return null;
            }
            $brand = new Brand();
            $brand->setBrandId($row['Brand_id']);
            $brand->setBrandName($row['Brand_name']);
            return $brand;
        }

        public  function getBrandByBrandName($brand_name) {
            $db = Database::getDB();
            $query = 'SELECT * FROM brands
                      WHERE Brand_name = :brand_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":brand_name", $brand_name);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();

            return $row;
        }

        public  function getBrands() {
            $db = Database::getDB();
            $query = 'SELECT * FROM brands';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            return $rows;
        }

        public  function addbrand($brandName) {
            $db = Database::getDB();
   
            $query = 'INSERT INTO `brands`(`Brand_name`) VALUES (:brandName)';
            $statement = $db->prepare($query);
            $statement->bindValue(":brandName", $brandName);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function deleteBrand($brandId) {
            $db = Database::getDB();
   
            $query = 'DELETE FROM `brands`
            WHERE Brand_id = :brandId';
            $statement = $db->prepare($query);
            $statement->bindValue(":brandId", $brandId);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function Bsearch($search) {
            $db = Database::getDB();
   
            $query = 'SELECT * FROM brands
                        Where Brand_id Like "%":search"%" 
                        Or Brand_name Like "%":search"%"';
            $statement = $db->prepare($query);
            $statement->bindValue(":search", $search);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            return $rows;
        }

        public  function updateBrand($brand_id,$brand_name) {
            $db = Database::getDB();
            $query = 'UPDATE `brands` SET `Brand_name`= :Brand_name
            WHERE Brand_id = :Brand_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":Brand_id", $brand_id);
            $statement->bindValue(":Brand_name", $brand_name);
            $statement->execute();
            $statement->closeCursor();
        }
    }
?>