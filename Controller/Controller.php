<?php
namespace application\Controller;
use application\Model as Model;
require_once './autoloader.php';
ini_set('display_errors',1); 
error_reporting(E_ALL);

class Controller
{
    public function getProducts () 
    {
      $helper = new Helper();
      $result = $helper -> retProducts ();
    
      return $result;
    }

    public function saveProduct ($data)
    {
      $controlhelp = new Helper();
      $mod = $controlhelp->checkType($data["type"]);
      $checksave = $mod->saveProduct($data);
      if($checksave === 1){
        return true;
      }
      else{
        return false;
      }
    }

    public function deleteProducts($data)
    {
      $prod = new Model\Book();
      for($i=0;$i<count($data);$i++){
        $prod->setSku($data[$i]);
        $prod->deleteProducts($prod->getSku());
      }
      return 1;
    }
}