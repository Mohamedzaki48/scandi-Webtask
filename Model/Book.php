<?php  
namespace application\Model;
require_once './autoloader.php';

// require_once "Product.php";
// require_once "Dbh.php";

 ini_set('display_errors',1); 
 error_reporting(E_ALL);
 
class Book extends Product{
private $weight;
public $ret = [];

public function setWeight($weight){
    $this->weight = $weight;
}
public function getWeight() {
    return $this->weight;
}

public function saveProduct($data)
{    $this->setSku($data["sku"]);

    $checkprod = $this->checkSku($this->getSku());
if($checkprod === 1){
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
     return 1;
}else{
    return 0;
}


    
}


public function getAllProducts(){
    $conn = $this->connect();
    $sql = "SELECT sku,name,price,type,weight FROM items WHERE type ='book'"; // SQL with parameters
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $result = $stmt->get_result(); 
 
   while ($row = $result->fetch_assoc()) {
    $stat= "<div class='box'> <input type='checkbox' form='delete' class='delete-checkbox' name='scales' value ='{$row["sku"]}' >
    <br> 
    <label id = 'product-info' for='delete-checkbox'>{$row["sku"]}<br>{$row["name"]}<br>{$row["price"]} $<br> Weight: {$row["weight"]} KG </label>
    </div>";
    array_push($this->ret,$stat);
}
      return $this->ret;
     }
}