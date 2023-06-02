<?php include_once ("product.php");
require_once("dbh.php")
?>
<?php 
 ini_set('display_errors',1); 
 error_reporting(E_ALL);
class Book extends Product{
private $weight;


public function setWeight($weight){
    $this->weight = $weight;
}
public function getWeight() {
    return $this->weight;
}

public function saveProduct($data)
{
    $this->setSku($data["sku"]);
    $this->setName($data["name"]);
    $this->setPrice($data["price"]);
    $this ->setType($data["type"]);
    $this->setWeight($data["spec"][0]);
    $newName = $this->getName();
    $newSku = $this->getSku();
    $newPrice =  $this->getPrice();
    $newWeight = $this->getWeight();
    $newType = $this->getType();



    $what = $this->connect();
    $stmt = $what->prepare("INSERT INTO items(SKU,name,type,weight,price) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssii",$newSku,$newName,$newType,$newWeight,$newPrice);
    $stmt->execute();
     $stmt->close();
   //$result=mysqli_query($what,$sql);



    
}
}