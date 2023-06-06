<?php require_once "product.php";
require_once "dbh.php"?>
<?php 
class Disc extends Product{
    private $size;


public function setSize($size){
    $this->size = $size;
}
public function getSize() {
    return $this->size;
}


public function saveProduct($data)
{
    //printf($data['name']);
    $this->setSku($data["sku"]);
    $this->setName($data["name"]);
    $this->setPrice($data["price"]);
    $this ->setType($data["type"]);
    $this->setSize($data["spec"][0]);
    $newName = $this->getName();
    $newSku = $this->getSku();
    $newPrice =  $this->getPrice();
    $newSize = $this->getSize();
    $newType = $this->getType();



    $what = $this->connect();
    $stmt = $what->prepare("INSERT INTO items(SKU,name,type,size,price) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssii",$newSku,$newName,$newType,$newSize,$newPrice);
    $stmt->execute();
     $stmt->close();
 
}


public function getAllProducts(){
    $conn = $this->connect();
    $sql = "SELECT sku,name,price,type,size FROM items WHERE type ='disc'"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
   // $user = $result->fetch_assoc(); //
//    $data = $result->fetch_all(MYSQLI_ASSOC);
      return $result;
     }
     
}