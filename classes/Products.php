<?php
    require_once("DBAccess.php");

    class Products
    {
        private $_db;

        public function __construct()
        {
            //get database settings
            include "settings/db.php";
            try
            {
            //create database object
            $this->_db = new DBAccess($dsn, $username, $password);
            }
            catch (PDOException $e)
            {
                die("Unable to connect to database, ". $e->message());
            }
        }

        public function getProducts()
        {
            try
            {
                //connect to db
                $pdo = $this->_db->connect();
                //set up SQL
                $sql = "SELECT p.Id, p.Name, Photo, Price, SalePrice, Description, Featured, CategoryID, c.Name CategoryName FROM Products p, Categories c WHERE p.CategoryID = c.Id";
                $stmt = $pdo->prepare($sql);
                //execute SQL
                return $this->_db->executeSQL($stmt);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
        }

        public function getProductsByFeatured($isFeatured)
        {
            if (is_bool($isFeatured) === false) {
                return [];
            }
            try
            {
                //connect to db
                $pdo = $this->_db->connect();
                //set up SQL
                $sql = "SELECT Id, Name, Photo, Price, SalePrice FROM Products WHERE Featured = $isFeatured";
                $stmt = $pdo->prepare($sql);
                //execute SQL
                return $this->_db->executeSQL($stmt);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
        }

        public function getProductsBySearch($value)
        {
            try
            {
                //connect to db
                $pdo = $this->_db->connect();
                //set up SQL
                $sql = "SELECT Id, Name, Photo, Price, SalePrice FROM Products WHERE Name LIKE '%$value%'";
                $stmt = $pdo->prepare($sql);
                //execute SQL
                return $this->_db->executeSQL($stmt);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
        }

        public function GetProductById($id)
        {
            //connect to db
            $pdo = $this->_db->connect();
            //set up SQL
            $sql = "SELECT * FROM Products WHERE Id = $id";
            $stmt = $pdo->prepare($sql);
            //execute SQL
            $rows = $this->_db->executeSQL($stmt);

            return $rows[0];
        }

        public function GetProductByCategory($categoryId)
        {
            $pdo = $this->_db->connect();
                //set up SQL
            $sql = "SELECT Id, Name, Photo, Price, SalePrice FROM Products WHERE CategoryID = $categoryId";
            $stmt = $pdo->prepare($sql);
            //execute SQL
            return $this->_db->executeSQL($stmt);
        }

        public function insertProduct($name, $description, $price, $salePrice, $photo, $featured, $categoryID)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "INSERT INTO Products(Name, Photo, Price, SalePrice, Description, Featured, CategoryID)  VALUES (:Name, :Photo, :Price, :SalePrice, :Description, :Featured, :CategoryID)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":Name", $name, PDO::PARAM_STR);
                $stmt->bindValue(":Description", $description, PDO::PARAM_STR);
                $stmt->bindValue(":Price", $price, PDO::PARAM_STR);
                $stmt->bindValue(":SalePrice", $salePrice, PDO::PARAM_STR);
                $stmt->bindValue(":Photo", $photo, PDO::PARAM_STR);
                $stmt->bindValue(":Featured", $featured, PDO::PARAM_STR);
                $stmt->bindValue(":CategoryID", $categoryID, PDO::PARAM_STR);

                $this->_db->executeNonQuery($stmt, true);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
            
        }

        public function updateProduct($id, $name, $description, $price, $salePrice, $featured, $categoryID)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "UPDATE Products SET Name=:Name ,Price=:Price ,SalePrice=:SalePrice ,Description=:Description ,Featured=:Featured ,CategoryID=:CategoryID  WHERE Id = :Id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":Id", $id, PDO::PARAM_STR);
                $stmt->bindValue(":Name", $name, PDO::PARAM_STR);
                $stmt->bindValue(":Description", $description, PDO::PARAM_STR);
                $stmt->bindValue(":Price", $price, PDO::PARAM_STR);
                $stmt->bindValue(":SalePrice", $salePrice, PDO::PARAM_STR);
                $stmt->bindValue(":Featured", $featured, PDO::PARAM_STR);
                $stmt->bindValue(":CategoryID", $categoryID, PDO::PARAM_STR);

                $this->_db->executeNonQuery($stmt, true);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
            
        }

        public function updatePhoto($id, $photo)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "UPDATE Products SET Photo=:Photo  WHERE Id = :Id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":Id", $id, PDO::PARAM_STR);
                $stmt->bindValue(":Photo", $photo, PDO::PARAM_STR);

                $this->_db->executeNonQuery($stmt, true);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
            
        }

        public function deleteProduct($id)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "DELETE FROM Products WHERE Id = :Id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":Id", $id, PDO::PARAM_STR);

                $this->_db->executeNonQuery($stmt, true);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
            
        }
    }