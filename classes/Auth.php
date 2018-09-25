<?php
    require_once("DBAccess.php");

    class Auth
    {
        //constants hold values that do not change
        const LoginPageURL = "./login.php";
        private static $_db;

        public static function login($uname, $pword)
        {
            

            //get database settings
            include "settings/db.php";

            try
            {
                self::$_db = new DBAccess($dsn, $username, $password);
            }
            catch (PDOException $e)
            {
                die("Unable to connect to database, ". $e->message());
            }

            $hash = self::verify($uname);

            if(password_verify($pword, $hash))
            {
                $_SESSION["username"] = $uname;

                $pdo = self::$_db->connect();
                $sql = "SELECT UsernameId FROM User WHERE Username=:username";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
                $_SESSION["UsernameId"] = self::$_db->executeSQLReturnOneValue($stmt);

                header("Location: " . "./");
                exit;
            }
            else
            {
                return false;
            }
        }

        public static function logout()
        {
            unset($_SESSION["username"]);

            header("Location: " . "./");
            exit;
        }

        //check if user is logged in
        public static function protect()
        {
            if (!isset($_SESSION["username"])) 
            {
                header("Location: " . self::LoginPageURL);
                exit;
            }
        }

        public static function authorize()
        {
            if (isset($_SESSION["username"])) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        //create a new user
        public function createUser($fName, $lName, $uname, $pword)
        {
            //hash the password
            $hash = password_hash($pword, PASSWORD_DEFAULT);
            //get database settings
            include "settings/db.php";
            try
            {
                self::$_db = new DBAccess($dsn, $username, $password);
            }
            catch (PDOException $e)
            {
                die("Unable to connect to database, ". $e->message());
            }
            //add user to database
            try
            {
                //connect to db as the class is static we need to use
                //the keyword self instead of this
                $pdo = self::$_db->connect();
                //set up SQL and bind parameters
                $sql = "INSERT INTO User(Username, Password, FirstName, LastName) VALUES (:username, :password, :firstName, :lastName)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
                $stmt->bindParam(":password", $hash, PDO::PARAM_STR);
                $stmt->bindParam(":firstName", $fName, PDO::PARAM_STR);
                $stmt->bindParam(":lastName", $lName, PDO::PARAM_STR);
                //execute SQL as the class is static we need to use
                //the keyword self instead of this
                $result = self::$_db->executeNonQuery($stmt);
            }
            catch (PDOException $e)
            {
                throw $e;
            }

            header('Location: '.'./');
        }

        public static function updatePassword($id, $currentPassword, $newPassword)
        {
            include "settings/db.php";
            try
            {
                self::$_db = new DBAccess($dsn, $username, $password);
            }
            catch (PDOException $e)
            {
                die("Unable to connect to database, ". $e->message());
            }
            $hash = self::verify($_SESSION["username"]);

            if(password_verify($currentPassword, $hash))
            {
                $newHash = password_hash($newPassword, PASSWORD_DEFAULT);

                try
                {
                    $pdo = self::$_db->connect();

                    $sql = "UPDATE User SET Password=:password WHERE UsernameId = :userId";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":userId", $id, PDO::PARAM_STR);
                    $stmt->bindParam(":password", $newHash, PDO::PARAM_STR);

                    $result = self::$_db->executeNonQuery($stmt);
                }
                catch (PDOException $e)
                {
                    throw $e;
                }
                header('Location: '.'./');    
            }
            else
            {
                return false;
            }

            
        }

        private static function verify($uname)
        {
            try
            {
                //connect to db as the class is static we need to use
                //the keyword self instead of this
                $pdo = self::$_db->connect();
                //set up SQL and bind parameters
                $sql = "SELECT password FROM User WHERE Username=:username";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
                //execute SQL as the class is static we need to use
                //the keyword self instead of this
                $hash = self::$_db->executeSQLReturnOneValue($stmt);
                return $hash;
            }
            catch (PDOException $e)
            {
                throw $e;
            }
        }
    }