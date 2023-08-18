<?php 
    class InvoiceDB{
        public  function getInvoice($invoice_id) {
            $db = Database::getDB();
            $query = 'SELECT * FROM invoices
                      WHERE invoice_id = :invoice_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":invoice_id", $invoice_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
        
            $invoice = new Invoice();
            $invoice->setInvoice_id($row['invoice_id']);
            $invoice->setUser_name($row['user_name']);
            $invoice->setQuantity_product($row['quantity_product']);
            $invoice->setShipCode($row['shipCode']);
            $invoice->setInvoice_total($row['invoice_total']);
            $invoice->setDelivery_address($row['delivery_address']);
            $invoice->setInvoice_date($row['invoice_date']);
            $invoice->setStatus($row['Status']);
            return $invoice;
        }
        
        public  function getInvoices() {
            $db = Database::getDB();
            $query = 'SELECT * FROM invoices
                        Order by `Status` DESC ,invoice_id ';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
        
            return $rows;
        }

        public  function getInvoiceNew() {
            $db = Database::getDB();
            $query = 'SELECT * FROM invoices
                      Order by invoice_id DESC
                      LIMIT 1';
            $statement = $db->prepare($query);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
        
            $invoice = new Invoice();
            $invoice->setInvoice_id($row['invoice_id']);
            $invoice->setUser_name($row['user_name']);
            $invoice->setQuantity_product($row['quantity_product']);
            $invoice->setShipCode($row['shipCode']);
            $invoice->setInvoice_total($row['invoice_total']);
            $invoice->setDelivery_address($row['delivery_address']);
            $invoice->setInvoice_date($row['invoice_date']);
            $invoice->setStatus($row['Status']);
            return $invoice;
        }

        public  function insertInvoice($user_name,$quantity_product,$invoice_total,$delivery_address,$shipCode) {
            $db = Database::getDB();
            $query = 'INSERT INTO invoices(user_name,quantity_product,shipCode,invoice_total,delivery_address)
                        Values (:user_name, :quantity_product,:shipCode, :invoice_total, :delivery_address)';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_name", $user_name);
            $statement->bindValue(":quantity_product", $quantity_product);
            $statement->bindValue(":shipCode", $shipCode);
            $statement->bindValue(":invoice_total", $invoice_total);
            $statement->bindValue(":delivery_address", $delivery_address);
            $statement->execute();
        }

        public  function getInvoiceByUser_name($user_name) {
            $db = Database::getDB();
            $query = 'SELECT * FROM invoices
                      WHERE user_name = :user_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_name", $user_name);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
        
            return $rows;
        }

        public  function Isearch($search) {
            $db = Database::getDB();
            $query = 'SELECT * FROM invoices
                        Where invoice_id Like "%":search"%" 
                        Or user_name Like "%":search"%"
                        or quantity_product Like "%":search"%"
                        or shipCode Like "%":search"%"
                        or invoice_total Like "%":search"%"
                        or delivery_address Like "%":search"%"
                        or Status Like "%":search"%"
                        Order by `Status` DESC ,invoice_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":search", $search);
            $statement->execute();
            $rows = $statement->fetchAll();
        }

        public  function updateStatus($invoice_id,$status) {
            $db = Database::getDB();
            $query = 'UPDATE `invoices` SET Status= :status 
            WHERE invoice_id = :invoice_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":invoice_id", $invoice_id);
            $statement->bindValue(":status", $status);
            $statement->execute();
            
        }
    }
?>