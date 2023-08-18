<?php 
    class Contact{
        private $contactId,$fullName , $email, $message, $status;

        public function __construct() {
            $this->contactId = 0;
            $this->fullName = null;
            $this->email = null;
            $this->message = null;
            $this->status = null;
        }
        
        public function getContactId() {
            return $this->contactId;
        }
    
        public function setContactId($value) {
            $this->contactId = $value;
        }

        public function getFullName() {
            return $this->fullName;
        }
    
        public function setFullName($value) {
            $this->fullName = $value;
        }

        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($value) {
            $this->email = $value;
        }

        public function getMessage() {
            return $this->message;
        }
    
        public function setMessage($value) {
            $this->message = $value;
        }
        
        public function getStatus() {
            return $this->status;
        }
    
        public function setStatus($value) {
            $this->status = $value;
        }

    }
?>