<?php include "model-helpers.php" ;
include "controller-helper.php";
include_once "product.php"
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
  $modelhelp = new ModelHelper();
  $ret = $modelhelp->checkSku($data["sku"]);
   $controlhelp = new ControllerHelper();
    if($ret === 1){
      $mod = $controlhelp->checkType($data["type"]);

      $mod->saveProduct($data);
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