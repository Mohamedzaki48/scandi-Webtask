<?php  


require_once "./Model/disc.php";
require_once "./Model/book.php";
require_once "./Model/furntiture.php";

 ini_set('display_errors',1); 
 error_reporting(E_ALL);
class ControllerHelper{
   public $types = array("Furniture"=>"Furniture", "DVD"=>"DVD", "Book"=>"Book");
   public $ret = [];
   public function checkType($type){
    return new  $this->types[$type]();

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