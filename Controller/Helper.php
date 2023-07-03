<?php  
namespace application\Controller;
require_once './autoloader.php';
ini_set('display_errors',1); 
error_reporting(E_ALL);

class Helper
{
   public $types = array("Furniture"=>"Furniture", "DVD"=>"DVD", "Book"=>"Book");
   public $ret = [];

   public function checkType($type)
   {
      $mod = $this->types[$type];
      $obj = "application\Model\\$mod";
      
      return new $obj();
   }

   public function retProducts()
   {
      foreach ($this->types as $key => $value) {
         $mod = "application\Model\\$value";
         $obj =  new $mod();
         $result = $obj->getAllProducts();
         array_push($this->ret, $result);
       }
       return $this->ret;  
   }
}