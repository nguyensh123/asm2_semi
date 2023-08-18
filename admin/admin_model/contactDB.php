<?php 
    class ContactDB{
        public  function getContacts() {
            $db = Database::getDB();
            $query = 'SELECT * FROM contacts';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            return $rows;
        }

        public  function addContact($FullName,$Email,$Message) {
            $db = Database::getDB();
            $query = 'INSERT INTO contacts(FullName,Email,`Message`)
            VALUES (:FullName,:Email,:Message);';
            $statement = $db->prepare($query);
            $statement->bindValue(":FullName", $FullName);
            $statement->bindValue(":Email", $Email);
            $statement->bindValue(":Message", $Message);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function deleteContact($ContactId) {
            $db = Database::getDB();
            $query = 'DELETE FROM `contacts`
            WHERE ContactId = :ContactId';
            $statement = $db->prepare($query);
            $statement->bindValue(":ContactId", $ContactId);
            $statement->execute();
            $statement->closeCursor();
        }

        public  function updateStatus($ContactId,$status) {
            $db = Database::getDB();
            $query = 'UPDATE `contacts` SET Status= :status 
            WHERE ContactId = :ContactId';
            $statement = $db->prepare($query);
            $statement->bindValue(":ContactId", $ContactId);
            $statement->bindValue(":status", $status);
            $statement->execute();
            
        }

        public  function Csearch($search) {
            $db = Database::getDB();
            $query = 'SELECT * FROM contacts
                        Where ContactId Like "%":search"%" 
                        Or FullName Like "%":search"%"
                        Or Email Like "%":search"%"
                        Or Message Like "%":search"%"
                        Or Status Like "%":search"%"';
            $statement = $db->prepare($query);
            $statement->bindValue(":search", $search);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();

            return $rows;
        }
    }
?>