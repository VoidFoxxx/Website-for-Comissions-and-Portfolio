<?php
class Users extends Database {
    private $db;

    public function __construct(){
        $this->db = $this->connect();
    }

    public function register($email, $username, $password){
        try{
            $data = array(
                'email'=>$email,
            );
            
            $sql = "SELECT * FROM user WHERE email = :email";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
            if($query_run->rowCount() == 1) {
                return false;
            }
    
            // Dáta pre vloženie nového používateľa do databázy
            $data = array(
                'email' => $email,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role'=>'user'
            );
    
            // SQL dopyt na vloženie nového používateľa
            $sql = "INSERT INTO user (username, email, password,role) VALUES (:username, :email, :password, :role)";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
    
            // Úspešná registrácia
            return true;
        } catch(PDOException $e){
            // Spracovanie chyby, ak nastane
            echo "Chyba pri registrácii: " . $e->getMessage();
            return false;
        }
    }

    public function login($email, $password){
        //$username a $password došli z $_POST 
        try{
            $data = array(
                'email'=>$email,
            );
            
            $sql = "SELECT * FROM users WHERE email = :email";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
            if($query_run->rowCount() == 1) {
                $user = $query_run->fetch(PDO::FETCH_ASSOC);
                if($password == $user['password']){
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['username'] = $user['name'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['userId'] = $user['ID'];
                    return true;
                }
                return false;
            } else {
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}//password_verify($password, $user['password'])
?>
