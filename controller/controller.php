<?php 
include "controller-helper.php";
include_once "./model/product.php"
?>
<?php
  ini_set('display_errors',1); 
 error_reporting(E_ALL);
class Controller{


 
public function getProducts(){
  $res = new ControllerHelper();
  $result = $res->retProducts();
  return $result;

}


public function saveProduct($data){
   $controlhelp = new ControllerHelper();
   $mod = $controlhelp->checkType($data["type"]);
   $ret = $mod->saveProduct($data);
  

    if($ret === 1){
   return true;
  }else{ return false;}

}

public function deleteProducts($data){
  $prod = new Book();
  for($i=0;$i<count($data);$i++){
    $prod->setSku($data[$i]);
    $prod->deleteProducts($prod->getSku());
    
}
return 1;
}

    

}