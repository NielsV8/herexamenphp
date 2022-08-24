<?php 
    include_once(__DIR__ ."/Database.php");

    class User{
        private $username;
        private $password;
        private $user_id;

        public function getUsername()
        {
                return $this->username;
        }

        public static function getUsernames($username)
        {
                $conn = Db::getConnection();
                $query = $conn->prepare("select * from users where username = :username");
                $query->bindValue(":username", $username);
                $query->execute();
                $user = ($query->fetch());
                return $user;
        }

        public function setUsername($username): self
        {
            if(empty($username)){
                throw new Exception("Username must not be empty");
            }
            $this->username = $username;
            return $this;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function setPassword($password): self
        {
                $this->password = $password;
                if(empty($this->password)){
                    throw new Exception("Password is required");
                } elseif (strlen($this->password) < 8){
                    throw new Exception("Password must be at least 8 characters");
                }

                return $this;
        }

        public function getUserId()
        {
                return $this->user_id;
        }

        public function setUserId($user_id): self
        {
                $this->user_id = $user_id;

                return $this;
        }

        public function register(){
            $username = $_POST['username'];
            $options = [
                'cost' => 12,
            ];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);

            $conn = Db::getConnection();
            $query = $conn->prepare("insert into users (username, password) values (:username, :password)");
            $query->bindValue(":username", $username);
            $query->bindValue(":password", $password);
            $query->execute();
        }

        public function login($username, $password){
            $conn = Db::getConnection();
            $query = $conn->prepare("select * from users where username = :username");
            $query->bindValue(":username", $username);
            $query->execute();
            $user = ($query->fetch());
            if(!$user){
                throw new Exception("User does not exist");
            }
            $hash = $user['password'];
            if(password_verify($password, $hash)){
                session_start();
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                throw new Exception("Username & Password do not match");
            }
            
        }
    }