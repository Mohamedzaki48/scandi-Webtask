<?php include 'dbh.php'?>

<?php 
 ini_set('display_errors',1); 
 error_reporting(E_ALL);
class ModelHelper extends Dbh{


   //Check if SKU exists in database
    public function checkSku($sku){
        $what = $this->connect();
         $sql = "SELECT * FROM items WHERE sku = '$sku'";
        $result=mysqli_query($what,$sql);


        if ( mysqli_num_rows($result)===0)
        {
      
        mysqli_free_result($result);
        return 1;
        } else return 0;
}

}