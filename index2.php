<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link href = "style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product list Page</title>
  </head>
  <body>
  <div class="container">
    
      <header class="header">
      <strong class = "titleproduct">Products List</strong>
        <form class="delete">
          <button id="delete-product-btn">
            <span>MASS Delete</span>
          </button>
        </form>
    <?php include 'ProductsListViewing.php'?>
  </body>
</html>
