<?php
namespace application\Model;
require_once './autoloader.php';



class Furniture extends Product{
    private $height;
    private $width;
    private $length;
 public $ret = [];
    public function setHeight($height){
        $this->height = $height;
    }
    public function getHeight() {
        return $this->height;
    }
   public function setWidth($width){
        $this->width = $width;
    }
    public function getWidth() {
        return $this->width;
    }
    public function setLength($length){
        $this->length = $length;
    }
    public function getLength() {
        return $this->length;
    }
    
    public function saveProduct($data)
    {
        $this->setSku($data["sku"]);

    $checkprod = $this->checkSku($this->getSku());
if($checkprod === 1){
        $this->setName($data["name"]);
        $this->setPrice($data["price"]);
        $this ->setType($data["type"]);
        $this->setHeight($data["spec"][0]);
        $this->setWidth($data["spec"][1]);
        $this->setLength($data["spec"][2]);

        $newName = $this->getName();
        $newSku = $this->getSku();
        $newPrice =  $this->getPrice();
        $newHeight = $this->getHeight();
        $newWidth = $this->getWidth();
        $newLength = $this->getLength();

        $newType = $this->getType();
    
    
    
        $what = $this->connect();
        $stmt = $what->prepare("INSERT INTO items(SKU,name,type,height,width,length,price) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssiiii",$newSku,$newName,$newType,$newHeight,$newWidth,$newLength,$newPrice);
        $stmt->execute();
         $stmt->close();
        return 1;
    } else return 0;
    
    
    
        
    }


    public function getAllProducts(){
        $conn = $this->connect();
        $sql = "SELECT sku,name,price,type,height,width,length FROM items WHERE type ='furniture'"; // SQL with parameters
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
      while ($row = $result->fetch_assoc()) {
        $stat= "<div class='box'> <input type='checkbox' form='delete' class='delete-checkbox' name='scales' value ='{$row["sku"]}' >
        <br> 
        <label id = 'product-info' for='delete-checkbox'>{$row["sku"]}<br>{$row["name"]}<br>{$row["price"]} $<br>Dimensions: {$row["height"]}x{$row["width"]}x{$row["length"]} </label>
        </div>";
array_push($this->ret,$stat);
    }
    return $this->ret;
         }

         
}