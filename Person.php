<?php
include_once 'autoloader.php';
class Person{
    public static function insertUser($name,$email,$password){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = MD5($_POST['password']);
        $role = $_POST['role'];
        $sql = "INSERT INTO utilisateurs SET userName = '$username',
                email ='$email', password ='$password', role='$role'";
        $conn->query($sql);
    }
    public static function loginUser($email,$password){
        Autoloader::register();
        $conn = Connection::conneect();
        $sql = "SELECT * FROM utilisateurs WHERE email='$email' AND password = '$password'";
        $res=$conn->query($sql);
        
        if(!$res) {
            die( "Error: " . $conn->error); 
            header("Location: login.php");
        } else {
            echo "<script>alert(".$res->num_rows.")</script>";
            if($res->num_rows > 0){
                $user = $res->fetch_assoc();
                $_SESSION["user"] =  $user["userName"];
                $_SESSION["roleUser"] =  $user["role"];
                header("Location: index.php");
            }
        }

    }
}