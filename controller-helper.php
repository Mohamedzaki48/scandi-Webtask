<?php include "disc.php";
include "book.php";
include "furntiture.php"?>
<?php  
 ini_set('display_errors',1); 
 error_reporting(E_ALL);
class ControllerHelper{
   public $age = array("Furniture"=>"Furniture", "Disc"=>"Disc", "Book"=>"Book");

   public function checkType($type){
    return new $this->age[$type]();

   }

}