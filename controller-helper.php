<?php include "disc.php";
include "book.php";
include "furntiture.php"?>
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
       //$result;
      foreach ($this->types as $key => $value) {
         
        $obj =  new $value();
        $result = $obj->getAllProducts();
        
        while($row = $result -> fetch_assoc())
        {
          $this->ret[]=$row;
        }
        
        
        
       }
       return $this->ret;  
        
       }


}