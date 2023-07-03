<?php
require_once 'autoloader.php';
use application\Controller as controller;
 ini_set('display_errors',1); 
 error_reporting(E_ALL);

 $control = new controller\Controller();
//Handling ADD PRODUCT 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = json_decode(file_get_contents("php://input"), true);
    $ret = $control->saveProduct($data);
    if($ret){
    //Product is saved 
        exit ("1");
    }
    else{
    //sku already exist
        exit ("0");
    }
 
}
//Handling GET PRODUCTS
else if ($_SERVER["REQUEST_METHOD"] == "GET"){
    $products =  $control->getProducts();
    for($i=0;$i<count($products);$i++){
        while ($row = $products[$i]->fetch_assoc()) {
            $help = new controller\Helper();
            $obj = $help -> checkType($row["type"]);
            $stmt = $obj -> getSpecifications($row);
            $stat = "<div class='box'> <input type='checkbox' form='delete' class='delete-checkbox' name='scales' value ='{$row["sku"]}' >
                          <br> 
                          <label id = 'product-info' for='delete-checkbox'>{$row["sku"]}<br>{$row["name"]}<br>{$row["price"]} $<br> {$stmt}  </label>
                     </div>";
            echo $stat; 
        }
    }
}
 //Handling DELETE PRODUCTS 
else if($_SERVER["REQUEST_METHOD"] == "DELETE"){
        $prod = json_decode(file_get_contents("php://input"), true);
        $dele = $control->deleteProducts($prod);
}

?>


