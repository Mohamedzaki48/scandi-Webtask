<?php 
namespace application\Model;
require_once './autoloader.php';

class DVD extends Product{
    private $size;
    
    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
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
        }
        else 
            return 0;
    }

    public function getAllProducts()
    {
        $conn = $this->connect();
        $sql = "SELECT sku,name,price,type,size FROM items WHERE type ='DVD'"; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result

        return $result;
    } 

    public function getSpecifications($row)
    {
       return 'Size:'." " .$row["size"]." "."MB";
       
    }
}
