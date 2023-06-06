<?php include "./model/disc.php";
include "./model/book.php";
include "./model/furntiture.php"?>
<?php  
 ini_set('display_errors',1); 
 error_reporting(E_ALL);
class ControllerHelper{
   public $types = array("Furniture"=>"Furniture", "Disc"=>"Disc", "Book"=>"Book");
   public $ret = [];
   public function checkType($type){
    return new $this->types[$type]();

   }
   public function retProducts(){
      foreach ($this->types as $key => $value) {
         $obj =  new $value();
        $result = $obj->getAllProducts();
       array_push($this->ret, $result);
       }
       return $this->ret;  
        
       }


}