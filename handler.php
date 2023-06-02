<?php include "controller.php";
?>

<?php
 ini_set('display_errors',1); 
 error_reporting(E_ALL);

$data = json_decode(file_get_contents("php://input"), true);



$check = new Controller();
$ret = $check->saveProduct($data);
if($ret){
    //then product is saved tamam
    exit ("1");
}else{
    //sku already exist
    exit ("0");

}


?>


