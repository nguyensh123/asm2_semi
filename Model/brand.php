<?php 
    class Brand{
        private $brand_id, $brand_name;

        public function __construct() {
            $this->brand_id = 0;
            $this->brand_name = null;
        }
        
        public function getBrandId() {
            return $this->brand_id;
        }
    
        public function setBrandId($value) {
            $this->brand_id = $value;
        }

        public function getBrandName() {
            return $this->brand_name;
        }
    
        public function setBrandName($value) {
            $this->brand_name = $value;
        }

    }
?>