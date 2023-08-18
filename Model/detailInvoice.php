<?php 
    class Detail{
        private $detail_id, $invoice_id,$product_name,$brand_name,$price,$quantity,$total;

        public function __construct() {
            $this->detail_id = 0;
            $this->invoice_id = 0;
            $this->product_name = null;
            $this->brand_name = null;
            $this->	price = 0;
            $this->	quantity = 0;
            $this->	total = 0;
        }
        
        public function getInvoice_id() {
            return $this->invoice_id;
        }
    
        public function setInvoice_id($value) {
            $this->invoice_id = $value;
        }

        public function getDetail_id() {
            return $this->detail_id;
        }
    
        public function setDetail_id($value) {
            $this->detail_id = $value;
        }

        public function getProduct_name() {
            return $this->product_name;
        }
    
        public function setProduct_name($value) {
            $this->product_name = $value;
        }

        public function getBrand_name() {
            return $this->brand_name;
        }
    
        public function setBrand_name($value) {
            $this->brand_name = $value;
        }

        public function getPrice() {
            return $this->price;
        }
    
        public function setPrice($value) {
            $this->price = $value;
        }

        public function getQuantity() {
            return $this->quantity;
        }
    
        public function setQuantity($value) {
            $this->quantity = $value;
        }

        public function getTotal() {
            return $this->total;
        }
    
        public function setTotal($value) {
            $this->total = $value;
        }
    }
?>