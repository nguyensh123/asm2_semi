<?php 
    class AccountDB{
        public  function getAccount($user_id) {
            $db = Database::getDB();
            global $accountDB;
            $query = 'SELECT * FROM users_table
                      WHERE user_id = :user_id';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_id", $user_id);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
        
            $account = new Account();
            $account->setUserId($row['user_id']);
            $account->setUserName($row['user_name']);
            $account->setFullName($row['full_name']);
            $account->setAmount($row['amount']);
            $account->setPassword($row['password']);
            $account->setEmail($row['email']);
            $account->setAddress($row['address']);
            $account->setPosition($row['position']);
            return $account;
        }

        public  function getAccounts() {
            $db = Database::getDB();
            global $accountDB;
            $query = 'SELECT * FROM users_table';
            $statement = $db->prepare($query);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function getAccount_by_userName($user_name) {
            $db = Database::getDB();
            global $accountDB;
            $query = 'SELECT * FROM users_table
                      WHERE user_name = :user_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_name", $user_name);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
        
            if ($row==null) return null;
            $account = new Account();
            $account->setUserId($row['user_id']);
            $account->setUserName($row['user_name']);
            $account->setFullName($row['full_name']);
            $account->setAmount($row['amount']);
            $account->setPassword($row['password']);
            $account->setEmail($row['email']);
            $account->setAddress($row['address']);
            $account->setPosition($row['position']);
            return $account;
        }

        public  function insertUser($userName,$password,$fullName,$email,$address) {
            $db = Database::getDB();
            global $accountDB;
            $query = 'INSERT INTO users_table(user_name,password,full_name,email,address)
                        Values (:user_name, :password , :fullName ,:email, :address)';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_name", $userName);
            $statement->bindValue(":password", $password);
            $statement->bindValue(":fullName", $fullName);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":address", $address);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function updateAccount($userName,$fullName,$email,$address) {
            $db = Database::getDB();
            global $accountDB;
            $query = 'UPDATE users_table SET full_name=:fullName,email=:email,address=:address
                    WHERE user_name=:user_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_name", $userName);
            $statement->bindValue(":fullName", $fullName);
            $statement->bindValue(":email", $email);
            $statement->bindValue(":address", $address);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function updatePassword($userName,$pass) {
            $db = Database::getDB();
            global $accountDB;
            $query = 'UPDATE users_table SET password=:password
                    WHERE user_name=:user_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_name", $userName);
            $statement->bindValue(":password", $pass);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function updateAmount($userName,$money) {
            $db = Database::getDB();
            global $accountDB;
            $query = 'UPDATE users_table SET amount=:money
                    WHERE user_name=:user_name';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_name", $userName);
            $statement->bindValue(":money", $money);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function search($search) {
            $db = Database::getDB();
            $query = 'SELECT * FROM users_table
                        Where user_id Like "%":search"%" 
                        Or user_name Like "%":search"%"
                        Or full_name Like "%":search"%"
                        Or email Like "%":search"%"
                        Or address Like "%":search"%"
                        Or position Like "%":search"%"';
            $statement = $db->prepare($query);
            $statement->bindValue(":search", $search);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
            return $rows;
        }

        public  function delete($user_id) {
            $db = Database::getDB();
            $query = 'DELETE FROM `users_table` WHERE user_id=:user_id ';
            $statement = $db->prepare($query);
            $statement->bindValue(":user_id", $user_id);
            $statement->execute();
            $rows = $statement->fetchAll();
            $statement->closeCursor();
        }
    }
?>