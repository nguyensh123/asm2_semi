<?php 
    class Product{
        private $product_id, $product_name, $brand_id, $price, $product_detail, $quantity, $Product_date, $Product_view, $product_img,$numberOfSale;

        public function __construct() {
            $this->product_id = 0;
            $this->product_name = null;
            $this->product_img = null;
            $this->brand_id = 0;
            $this->price = 0;
            $this->product_detail = null;
            $this->quantity = 0;
            $this->Product_date = null;
            $this->Product_view = 0;
            $this->numberOfSale = 0;
        }
        
        public function getProduct_id() {
            return $this->product_id;
        }
    
        public function setProduct_id($value) {
            $this->product_id = $value;
        }

        public function getProduct_img() {
            return $this->product_img;
        }
    
        public function setProduct_img($value) {
            $this->product_img = $value;
        }

        public function getProduct_name() {
            return $this->product_name;
        }
    
        public function setProduct_name($value) {
            $this->product_name = $value;
        }

        public function getBrand_id() {
            return $this->brand_id;
        }
    
        public function setBrand_id($value) {
            $this->brand_id = $value;
        }
        
        public function getPrice() {
            return $this->price;
        }
    
        public function setPrice($value) {
            $this->price = $value;
        }

        public function getProduct_detail() {
            return $this->product_detail;
        }
    
        public function setProduct_detail($value) {
            $this->product_detail = $value;
        }

        public function getQuantity() {
            return $this->quantity;
        }
    
        public function setQuantity($value) {
            $this->quantity = $value;
        }

        public function getProduct_date() {
            return $this->Product_date;
        }
    
        public function setProduct_date($value) {
            $this->Product_date = $value;
        }

        public function getProduct_view() {
            return $this->Product_view;
        }
    
        public function setProduct_view($value) {
            $this->Product_view = $value;
        }

        public function getNumberOfSale() {
            return $this->numberOfSale;
        }
    
        public function setNumberOfSale($value) {
            $this->numberOfSale = $value;
        }
    }
?>