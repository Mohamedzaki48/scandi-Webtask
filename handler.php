<?php include "controller.php";
?>

<?php
 ini_set('display_errors',1); 
 error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"] == "POST"){
$data = json_decode(file_get_contents("php://input"), true);
$check = new Controller();
$ret = $check->saveProduct($data);
if($ret){
    //Product is saved 
    exit ("1");
}else{
    //sku already exist
    exit ("0");
}
}else if ($_SERVER["REQUEST_METHOD"] == "GET"){
    echo "El denia 3assal";
    
}

?>


