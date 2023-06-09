const addbtn = document.getElementById("btnadd");

//Validate Price field characters
export const isNumber = function (value) {
  const conv = +value;
  if (conv) {
    return true;
  } else {
    return false;
  }
};

// Sending data to Handler to Save Product
export const saveProduct = function (sku, name, price, type, spec) {
  var data = {
    name: name,
    sku: sku,
    price: price,
    type: type,
    spec: spec,
  };

  var xhr = new XMLHttpRequest();

  xhr.open("POST", "handler.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      let res = xhr.responseText.includes("1");

      if (res) {
        location.replace("./index.php");
      } else {
        alert("can't add product,Product Sku Already Exists");
      }
    }
  };

  xhr.send(JSON.stringify(data));
};

export const getProducts = function () {
  var xhl = new XMLHttpRequest();

  xhl.open("GET", "handler.php", true);
  xhl.setRequestHeader("Content-Type", "application/json");

  xhl.onreadystatechange = function () {
    if (xhl.readyState == XMLHttpRequest.DONE) {
      addbtn.insertAdjacentHTML("afterend", xhl.responseText);
    }
  };

  xhl.send();
};

// Sending Delete Request to Handler to Delete Product
export const deleteProducts = function (products) {
  var xhl = new XMLHttpRequest();

  xhl.open("DELETE", "handler.php", true);
  xhl.setRequestHeader("Content-Type", "application/json");

  xhl.onreadystatechange = function () {
    if (xhl.readyState == XMLHttpRequest.DONE) {
      location.replace("./index.php");
      console.log(xhl.responseText);
    }
  };

  xhl.send(JSON.stringify(products));
};
