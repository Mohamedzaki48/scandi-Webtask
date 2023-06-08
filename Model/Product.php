<?php 
namespace application\Model;
require_once './autoloader.php';

//  require_once("Dbh.php");
 ini_set('display_errors',1); 
 error_reporting(E_ALL);

  abstract class Product extends Dbh{
    private $sku;
    private $name;
    private $type;
    private $price;




    
public function setPrice($price){
    $this->price = $price;
}
public function setName($name){
    $this->name = $name;
}
public function setType($type){
    $this->type = $type;
}
public function setSku($sku){
    $this->sku = $sku;
}

public function getSku() {
    return $this->sku;
}

public function getPrice() {
    return $this->price;
}   
public function getName(){
    return $this->name;
}
public function getType(){
    return $this->type;
}
public abstract function saveProduct($data);

public abstract function getAllProducts();

public function deleteProducts($sku){
    $what = $this->connect();
    $stmt = $what->prepare("DELETE FROM items WHERE SKU = ? ");
    $stmt->bind_param("s",$sku);
    $stmt->execute();
     $stmt->close();
}

public function checkSku($sku){
    $what = $this->connect();
         $sql = "SELECT * FROM items WHERE sku = '$sku'";
        $result=mysqli_query($what,$sql);


        if ( mysqli_num_rows($result)===0)
        {
      
        mysqli_free_result($result);
        return 1;
        } else return 0;

}
}