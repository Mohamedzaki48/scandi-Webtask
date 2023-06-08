<?php 
namespace application\Model;
require_once './autoloader.php';

// require_once "Product.php";
// require_once "Dbh.php"; 

class DVD extends Product{
    private $size;
    public $ret =[];

public function setSize($size){
    $this->size = $size;
}
public function getSize() {
    return $this->size;
}


public function saveProduct($data)
{
    $this->setSku($data["sku"]);

    $checkprod = $this->checkSku($this->getSku());
if($checkprod === 1){
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
    return 1;
}else return 0;
 
}


public function getAllProducts(){
    $conn = $this->connect();
    $sql = "SELECT sku,name,price,type,size FROM items WHERE type ='DVD'"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
   // $user = $result->fetch_assoc(); //
//    $data = $result->fetch_all(MYSQLI_ASSOC);
while ($row = $result->fetch_assoc()) {
    $stat= "<div class='box'> <input type='checkbox' form='delete' class='delete-checkbox' name='scales' value ='{$row["sku"]}' >  
    <br> 
    <label id = 'product-info' for='delete-checkbox'>{$row["sku"]}<br>{$row["name"]}<br>{$row["price"]} $<br> Size: {$row["size"]} MB </label>
    </div>";
    array_push($this->ret,$stat);
}
      return $this->ret;
     }
     
}