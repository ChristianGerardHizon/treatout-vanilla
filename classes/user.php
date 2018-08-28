<?php
class User {

    protected $connection;

    public function __construct($connection) {

        $this->connection = $connection;
    }


    public function getAll() {

        $query = "SELECT * FROM users";

        $query = $this->connection->prepare($query);

        $query->execute();

        return $data =  $query->fetchAll(PDO::FETCH_OBJ);
        
    }



    public function login($email, $password) {

        session_start();

        $q = $this->connection->prepare('SELECT * FROM users WHERE email = ? AND password = ?');

        $q->execute([$email,$password]);

        $count = $q->rowCount();


        if($count == 0) {

            return false;

        } else {


          $data = $q->fetch(PDO::FETCH_OBJ);

          $_SESSION['email'] = $data->email;
          $_SESSION['name'] = $data->name;
          $_SESSION['login'] = true;
    
          
          return true;

        }
        
    }


    public function adminlogin($email, $password) {

        session_start();

        $q = $this->connection->prepare('SELECT * FROM users WHERE email = ? AND password = ?');

        $q->execute([$email,$password]);

        $count = $q->rowCount();


        if($count == 0) {

            return false;

        } else {


          $data = $q->fetch(PDO::FETCH_OBJ);
          $_SESSION['login'] = true;
          $_SESSION['is_admin'] = 1;
          
          return true;

        }
        
    }


    public function register($name,$email,$password) {

        $stmt = $this->connection->prepare( "SELECT * FROM users WHERE email = ?" );

        $stmt->execute([$email]); 

        $res = $stmt->fetch();

        if( !$res ) {

            $data = [

                    'name' => $name,

                    'email' => $email,

                    'password' => md5($password),

                ];


            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

            $stmt= $this->connection->prepare($sql);

            $res = $stmt->execute($data);


            if($res) {

    
               return true;

            } 


        } else  {


           return false;

        }   
        
    }

    
}