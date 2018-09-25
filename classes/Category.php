<?php
    require_once("DBAccess.php");
    class Category
    {
        //private properties
        private $_id;
        private $_name;

        private $_db;
        //constructor sets up the database settings and creates a DBAccess object
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

        public function getCategories()
        {
            try
            {
                //connect to db
                $pdo = $this->_db->connect();
                //set up SQL
                $sql = "select * from Categories";
                $stmt = $pdo->prepare($sql);
                //execute SQL
                $rows = $this->_db->executeSQL($stmt);
                return $rows;
            }
            catch (PDOException $e)
            {
                throw $e;
            }
        }

        public function getCategory($id)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "SELECT Id, Name FROM Categories WHERE Id = $id";
                $stmt = $pdo->prepare($sql);
                //execute SQL
                $rows = $this->_db->executeSQL($stmt);
                
                return $rows[0];
            }
            catch (PDOException $e)
            {
                throw $e;
            }
        }

        public function insertCategory($name)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "INSERT INTO Categories(Name) VALUES (:CategoryName)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":CategoryName", $name, PDO::PARAM_STR);

                $this->_db->executeNonQuery($stmt, true);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
            
        }

        public function updateCategory($id, $name)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "UPDATE Categories SET Name=:CategoryName WHERE Id = :CategoryId";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":CategoryId", $id, PDO::PARAM_STR);
                $stmt->bindValue(":CategoryName", $name, PDO::PARAM_STR);

                $this->_db->executeNonQuery($stmt, true);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
            
        }

        public function deleteCategory($id)
        {
            try
            {
                $pdo = $this->_db->connect();

                $sql = "DELETE FROM Categories WHERE Id = :CategoryId";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(":CategoryId", $id, PDO::PARAM_STR);

                $this->_db->executeNonQuery($stmt, true);
            }
            catch (PDOException $e)
            {
                throw $e;
            }
            
        }
    }
?>