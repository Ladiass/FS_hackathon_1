<?php 
    include_once __DIR__."/db.conn.php";
    class Users{
        public static function Login($data){
            $user = $data["username"];
            $password = $data["password"];
            $user = Users::verify_user($user,true);
            if(!$user){
                return "User Not Found!";
                die();
            }
            if(!password_verify($password , $user["password"])){
                return "Username/Pass Wrong!";
                die();
            };
            $_SESSION["user_details"] = $user;
            return 1;
        }

        public static function Register($data ,$table= "users"){
            global $conn;
            $username = $data["username"];
            $email = $data["email"];
            $password = $data["pass"];
            $password2 = $data["pass2"];
            if(Users::verify_user($username)){
                echo "Username already Register, Pls Try other";
                die();
            }
            if(Users::verify_email($email)){
                die("Email already Register, Pls Try other");
            }
            if(strlen($username) <= 4){
                die("Username Cant least then 4");
            }
            if(strlen($password) <= 5){
                die("Username Cant least then 5");
            }
            if($password != $password2){
                die("Password and Password 2 must be same!");
            }
            $hash_password = password_hash($password,PASSWORD_DEFAULT);
            $sql= "INSERT INTO ? (`username` , `email` , `password` , `image`) VALUES(?,?,?,?)";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                die("Fails to Connect Database");
            }
            $stmt->bind_param("sssss",$table,$username,$email,$password,$image_path);
            $stmt->execute();
            $_SESSION["status"] = "Successfully Register";
            $stmt->close();
            $conn->close();
        }

        public static function Logout(){
            session_unset();
            session_destroy();
        }

        public static function verify_user($username ,$get_data = false ,$table = "users"){
            global $conn;
            $sql = "SELECT * FROM ? WHERE username = ?";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                return "Fails to Connect Database";
                die();
            }
            $stmt->bind_param("sss",$table,$username);
            $stmt->execute();
            $verify_user = $stmt->get_result()->fetch_assoc();
            if(count($verify_user) <= 0 ){
                return 0;
                $stmt->close();
                $conn->close();
                die();
            }
            if(!$get_data){
                return 1;
            }else{
                return $verify_user;
            }
            $stmt->close();
            $conn->close();
        }

        public static function verify_email($email ,$get_data = false ,$table = "users"){
            global $conn;
            $sql = "SELECT * FROM ? WHERE email = ?";
            $stmt = $conn->stmt_init();
            if(!$stmt->prepare($sql)){
                return "Fails to Connect Database";
                die();
            }
            $stmt->bind_param("sss",$table,$email);
            $stmt->execute();
            $verify_user = $stmt->get_result()->fetch_assoc();
            if(count($verify_user) <= 0 ){
                return 0;
                $stmt->close();
                $conn->close();
                die();
            }
            if(!$get_data){
                return 1;
            }else{
                return $verify_user;
            }
            $stmt->close();
            $conn->close();
        }
    }