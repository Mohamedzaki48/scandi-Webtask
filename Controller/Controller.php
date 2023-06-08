<?php
namespace application\Controller;
use application\Model as Model;
require_once './autoloader.php';
//  require_once "Helper.php";
 //require_once "./model/product.php";

  ini_set('display_errors',1); 
 error_reporting(E_ALL);
class Controller{


 
public function getProducts(){
  $res = new Helper();
  $result = $res->retProducts();
  return $result;

}


public function saveProduct($data){
   $controlhelp = new Helper();
   $mod = $controlhelp->checkType($data["type"]);
   $ret = $mod->saveProduct($data);
  

    if($ret === 1){
   return true;
  }else{ return false;}

}

public function deleteProducts($data){
  $prod = new Model\Book();
  for($i=0;$i<count($data);$i++){
    $prod->setSku($data[$i]);
    $prod->deleteProducts($prod->getSku());
    
}
return 1;
}

    

}