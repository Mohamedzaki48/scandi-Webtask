<?php
require_once 'autoloader.php';

use application\Controller as controller;


 ini_set('display_errors',1); 
 error_reporting(E_ALL);

 $check = new controller\Controller();

 //Handling ADD PRODUCT 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$data = json_decode(file_get_contents("php://input"), true);
$ret = $check->saveProduct($data);
if($ret){
    //Product is saved 
    exit ("1");
}else{
    //sku already exist
    exit ("0");
}

//Handling GET PRODUCTS 
}else if ($_SERVER["REQUEST_METHOD"] == "GET"){
   $products =  $check->getProducts();

     for($i=0;$i<count($products);$i++){
for($j=0;$j<count($products[$i]);$j++){
       echo $products[$i][$j];
     }}
  
 //Handling DELETE PRODUCTS 
}else if($_SERVER["REQUEST_METHOD"] == "DELETE"){
    $prod = json_decode(file_get_contents("php://input"), true);
$dele = $check->deleteProducts($prod);
    echo count($prod);
}

?>


