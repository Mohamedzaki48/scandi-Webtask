<?php 
class Dbh{
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "Products";

 public function connect(){


$conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
// Check connection
if ($conn->connect_error) {
    echo "no connection";
  die("Connection failed: " . $conn->connect_error);
}
//echo("EL denia shghala");
return $conn;
    }
    
}