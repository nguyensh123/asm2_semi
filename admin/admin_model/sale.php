<?php 
    class Sale{
        private $productName,$brand , $price, $numberOfSale, $amount;

        public function __construct() {
            $this->productName = null;
            $this->price = 0;
            $this->numberOfSale = 0;
            $this->amount = 0;
        }
        
        public function getProductName() {
            return $this->productName;
        }
    
        public function setProductName($value) {
            $this->productName = $value;
        }

        public function getPrice() {
            return $this->price;
        }
    
        public function setPrice($value) {
            $this->price = $value;
        }

        public function getBrand() {
            return $this->brand;
        }
    
        public function setBrand($value) {
            $this->brand = $value;
        }

        public function getNumberOfSale() {
            return $this->numberOfSale;
        }
    
        public function setNumberOfSale($value) {
            $this->numberOfSale = $value;
        }
        
        public function getAmount() {
            return $this->amount;
        }
    
        public function setAmount($value) {
            $this->amount = $value;
        }

    }
?>