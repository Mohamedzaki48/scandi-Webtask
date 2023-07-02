<?php
require_once 'autoloader.php';

use application\Controller as controller;

 ini_set('display_errors',1); 
 error_reporting(E_ALL);

 $cont = new controller\Controller();

//Handling ADD PRODUCT 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$data = json_decode(file_get_contents("php://input"), true);
$ret = $cont->saveProduct($data);
if($ret){
    //Product is saved 
    exit ("1");
}else{
    //sku already exist
    exit ("0");
}

//Handling GET PRODUCTS 
}else if ($_SERVER["REQUEST_METHOD"] == "GET"){
   $products =  $cont->getProducts();

     for($i=0;$i<count($products);$i++){
         while ($row = $products[$i]->fetch_assoc()) {


  
            $sd = new controller\Helper();
            $obj = $sd -> checkType($row["type"]);
            $stmt = $obj -> getSpecifications($row);
            $stat = "<div class='box'> <input type='checkbox' form='delete' class='delete-checkbox' name='scales' value ='{$row["sku"]}' >
                 <br> 
                 <label id = 'product-info' for='delete-checkbox'>{$row["sku"]}<br>{$row["name"]}<br>{$row["price"]} $<br> {$stmt}  </label>
                 </div>";
                  echo $stat; 
   

   
}

    }
  
 //Handling DELETE PRODUCTS 
}else if($_SERVER["REQUEST_METHOD"] == "DELETE"){
    $prod = json_decode(file_get_contents("php://input"), true);
$dele = $cont->deleteProducts($prod);
    echo count($prod);
}

?>


