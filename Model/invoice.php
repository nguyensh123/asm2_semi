<?php 
    class Invoice{
        private $invoice_id, $user_name,$quantity_product,$invoice_total,$invoice_date,$delivery_address,$shipCode,$status;

        public function __construct() {
            $this->invoice_id = 0;
            $this->user_name = null;
            $this->quantity_product = 0;
            $this->shipCode = 0;
            $this->invoice_total = 0;
            $this->invoice_date = null;
            $this->delivery_address = null;
            $this->status = null;
        }
        
        public function getInvoice_id() {
            return $this->invoice_id;
        }
    
        public function setInvoice_id($value) {
            $this->invoice_id = $value;
        }

        public function getUser_name() {
            return $this->user_name;
        }
    
        public function setUser_name($value) {
            $this->user_name = $value;
        }

        public function getQuantity_product() {
            return $this->quantity_product;
        }
    
        public function setQuantity_product($value) {
            $this->quantity_product = $value;
        }

        public function getShipCode() {
            return $this->shipCode;
        }
    
        public function setShipCode($value) {
            $this->shipCode = $value;
        }

        public function getInvoice_total() {
            return $this->invoice_total;
        }
    
        public function setInvoice_total($value) {
            $this->invoice_total = $value;
        }

        public function getInvoice_date() {
            return $this->invoice_date;
        }
    
        public function setInvoice_date($value) {
            $this->invoice_date = $value;
        }

        public function getDelivery_address() {
            return $this->delivery_address;
        }
    
        public function setDelivery_address($value) {
            $this->delivery_address = $value;
        }

        public function getStatus() {
            return $this->status;
        }
    
        public function setStatus($value) {
            $this->status = $value;
        }
    }
?>