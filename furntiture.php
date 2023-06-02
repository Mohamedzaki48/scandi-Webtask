<?php require_once "product.php";
require_once "dbh.php"
?>
<?php 
class Furniture extends Product{
    private $height;
    private $width;
    private $length;

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
       //$result=mysqli_query($what,$sql);
    
    
    
        
    }
}