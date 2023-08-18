<?php 
    class Account{
        private $user_id, $user_name, $full_name, $account, $password, $email, $address, $position;

        public function __construct() {
            $this->user_id = 0;
            $this->user_name = null;
            $this->full_name = null;
            $this->amount = 0;
            $this->password = null;
            $this->email = null;
            $this->address = null;
            $this->position = null;
        }
        
        public function getUserId() {
            return $this->user_id;
        }
    
        public function setUserId($value) {
            $this->user_id = $value;
        }

        public function getUserName() {
            return $this->user_name;
        }
    
        public function setUserName($value) {
            $this->user_name = $value;
        }

        public function getFullName() {
            return $this->full_name;
        }
    
        public function setFullName($value) {
            $this->full_name = $value;
        }
        
        public function getAmount() {
            return $this->account;
        }
    
        public function setAmount($value) {
            $this->account = $value;
        }

        public function getPassword() {
            return $this->password;
        }
    
        public function setPassword($value) {
            $this->password = $value;
        }

        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($value) {
            $this->email = $value;
        }

        public function getAddress() {
            return $this->address;
        }
    
        public function setAddress($value) {
            $this->address = $value;
        }

        public function getPosition() {
            return $this->position;
        }
    
        public function setPosition($value) {
            $this->position = $value;
        }
    }
?>