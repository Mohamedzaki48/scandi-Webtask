<?php include "model-helpers.php" ;
include "controller-helper.php"
?>
<?php
  ini_set('display_errors',1); 
 error_reporting(E_ALL);
class Controller{


 



public function saveProduct($data){
  $specifications = $data["spec"][0];
  $modelhelp = new ModelHelper();
  $ret = $modelhelp->checkSku($data["sku"]);
  
  $controlhelp = new ControllerHelper();
   
  if($ret === 1){
      $mod = $controlhelp->checkType($data["type"]);

      $mod->saveProduct($data);
      return true;
  }else{ return false;}

}

    

}