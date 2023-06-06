<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "View/addProductstyle.css" rel="stylesheet"/>

    <title>Document</title>
</head>
<body>
      <strong class = "titleproduct">Product ADD</strong>
      <form id = "product_form">
 
  <div class="form-group">
    <label for="sku">SKU</label>
    <input type="text" class="form-control" id="sku" placeholder="Enter SKU">
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" placeholder="Enter Price">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="productType">Type</label>
      <select id="productType" class="form-control">
        <option value="none" >Choose...</option>
        <option id ="Furniture" value="Furniture">Furniture</option>
        <option id ="Disc" value ="Disc">Disc</option>
        <option id = "Book" value ="Book">Book</option>

      </select>
    </div>
  <div class="boxes">
    <div class ="sizebox">
    <label for="size">Size (MB)</label>
    <input type="text" class="form-control" id="size" placeholder="Enter Size">
    </div>
    <div class ="dimensionsbox">
    <label for="height">Height(CM)</label>
    <input type="text" class="form-control" id="height" placeholder="Enter Height">
    <label for="width">Width(CM)</label>
    <input type="text" class="form-control" id="width" placeholder="Enter Width">
    <label for="length">Length(CM)</label>
    <input type="text" class="form-control" id="length" placeholder="Enter Length">
  </div>
    <div class ="weightbox">
    <label for="weight">Weight(KG)</label>
    <input type="text" class="form-control" id="weight" placeholder="Enter Weight">
    </div>
    </div>
  </div>
 
  <button type="submit" id="btnsave">Add</button>
</form>
<button id="btncancel">Cancel</button>
<script type = "module" src="View/script.js"></script>
</body>
</html>