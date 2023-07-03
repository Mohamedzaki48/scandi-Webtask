<?php  
namespace application\Model;

require_once './autoloader.php';
ini_set('display_errors',1); 
 error_reporting(E_ALL);
 
class Book extends Product
{
    private $weight;

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight() 
    {
        return $this->weight;
    }

    public function saveProduct($data)  
    {    
        $this->setSku($data["sku"]);
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
            $conn = $this->connect();
            $stmt = $conn->prepare("INSERT INTO items(SKU,name,type,weight,price) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssii",$newSku,$newName,$newType,$newWeight,$newPrice);
            $stmt->execute();
            $stmt->close();

            return 1;
        }
        else{
            return 0;
        }
    }

    public function getAllProducts()
    {
        $conn = $this->connect();
        $sql = "SELECT sku,name,price,type,weight FROM items WHERE type ='book'"; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->get_result(); 
        
        return $result;
    }

     public function getSpecifications($row)
    {
        return 'Weight:'." " .$row["weight"]." "."KG";
    }
}