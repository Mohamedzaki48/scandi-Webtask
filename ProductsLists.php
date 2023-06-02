<?php
      include "product.php";
include 'dbh.php';

?>
<?php
class ProductsLists extends Dbh{
public function showProductsList (){

$what = $this->connect();

//$sql = "SELECT * FROM items";
$prod = new Product();
//$result = $prod->getAllProducts($what);
//$result = $what->query($sql);
//after connection the controller send the connection to model
// if(!$result){
//   die("Error: " .$result->connect_error);
// }
//  while($row = $result->fetch_assoc()){
//    echo '<div class = "box"> <input type=checkbox class=delete-checkbox name=myman  value="'.$row.'"  > '.$row["SKU"].' <br> '.$row["name"].' <br> '.$row["type"].'</div>';
//  }
// $prod = new Product($what);
// $prod->getAllProducts();


}}

