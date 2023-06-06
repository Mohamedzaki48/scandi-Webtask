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
<h1 id= "titleproduct">Product Add</h1>
      <form id = "product_form">
 
  <div class="form-group">
    <label class="lab" for="sku">SKU</label>
    <input type="text" class="form-control" id="sku" placeholder="Enter SKU">
  </div>
  <div class="form-group">
    <label class="lab" for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label class="lab" for="price">Price</label>
    <input type="text" class="form-control" id="price" placeholder="Enter Price">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label class="lab" for="productType">Type</label>
      <select id="productType" class="form-control">
        <option value="none" >Choose...</option>
        <option id ="Furniture" value="Furniture">Furniture</option>
        <option id ="DVD" value ="DVD">DVD</option>
        <option id = "Book" value ="Book">Book</option>

      </select>
    </div>
  <div class="boxes">
    <div class ="sizebox">
    <label class="lab" for="size">Size (MB)</label>
    <input type="text" class="form-control" id="size" placeholder="Enter Size">
    </div>
    <div class ="dimensionsbox">
    <label class="lab" for="height">Height(CM)</label>
    <input  type="text" class="form-control" id="height" placeholder="Enter Height">
    <label class="lab" for="width">Width(CM)</label>
    <input type="text" class="form-control" id="width" placeholder="Enter Width">
    <label class="lab" for="length">Length(CM)</label>
    <input type="text" class="form-control" id="length" placeholder="Enter Length">
  </div>
    <div class ="weightbox">
    <label class="lab" for="weight">Weight(KG)</label>
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