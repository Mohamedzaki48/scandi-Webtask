<?php  
namespace application\Controller;

require_once './autoloader.php';
// require_once "./Model/Disc.php";
// require_once "./Model/Book.php";
// require_once "./Model/Furntiture.php";

 ini_set('display_errors',1); 
 error_reporting(E_ALL);
class Helper{
   public $types = array("Furniture"=>"Furniture", "DVD"=>"DVD", "Book"=>"Book");
   public $ret = [];
   public function checkType($type){
      $lol = $this->types[$type];
      $val = "application\Model\\$lol";
     return new $val();
    //return new Model\\$this->types[$type]();

   }
   public function retProducts(){
      foreach ($this->types as $key => $value) {
         $lo = "application\Model\\$value";
         $obj =  new $lo();
        $result = $obj->getAllProducts();
       array_push($this->ret, $result);
       }
       return $this->ret;  
        
       }


}