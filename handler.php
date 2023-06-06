<?php include "controller.php";
?>

<?php
 ini_set('display_errors',1); 
 error_reporting(E_ALL);
 $check = new Controller();
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
}else if ($_SERVER["REQUEST_METHOD"] == "GET"){
    //echo "El denia 3assal";
   $products =  $check->getProducts();
   for($i=0;$i<sizeof($products);$i++){
    echo "<div class='box'> <input type='checkbox' form='delete' class='delete-checkbox' name='scales' value ='{$products[$i]["sku"]}' >
   <br> 
   <label id = 'product-info' for='delete-checkbox'>{$products[$i]["sku"]}<br>{$products[$i]["name"]}<br>{$products[$i]["price"]} $</label>
   </div>";

   }
     
    // $data = json_encode($products);
    // echo $data;


}

?>


