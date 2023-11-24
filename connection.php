<?php
class Connection{
  public static function  conneect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php_1";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
  }
 
}
