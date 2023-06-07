//Validate name field characters
const addbtn = document.getElementById("btnadd");

export const validateName = function (name) {
  let letters = /^[A-Za-z]+$/;
  if (name.match(letters)) {
    return true;
  } else {
    return false;
  }
};

//Validate Price field characters
export const isNumber = function (value) {
  const conv = +value;
  if (conv) {
    return true;
  } else {
    return false;
  }
};

export const saveProduct = function (sku, name, price, type, spec) {
  var data = {
    name: name,
    sku: sku,
    price: price,
    type: type,
    spec: spec,
  };

  var xhr = new XMLHttpRequest();

  //👇 set the PHP page you want to send data to
  xhr.open("POST", "handler.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  //👇 what to do when you receive a response
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      let res = xhr.responseText.includes("1");

      if (res) {
        // location.reload();
        location.replace("./index.php");
      } else {
        alert("can't add product,Product Sku Already Exists");
      }
    }
  };

  //👇 send the data
  xhr.send(JSON.stringify(data));
};

export const getProducts = function () {
  var xhl = new XMLHttpRequest();

  xhl.open("GET", "handler.php", true);
  xhl.setRequestHeader("Content-Type", "application/json");

  //👇 what to do when you receive a response
  xhl.onreadystatechange = function () {
    if (xhl.readyState == XMLHttpRequest.DONE) {
      console.log(xhl.responseText);

      addbtn.insertAdjacentHTML("afterend", xhl.responseText);
    }
  };

  //👇 send the data
  xhl.send();
};

export const deleteProducts = function (products) {
  var xhl = new XMLHttpRequest();

  xhl.open("DELETE", "handler.php", true);
  xhl.setRequestHeader("Content-Type", "application/json");

  //👇 what to do when you receive a response
  xhl.onreadystatechange = function () {
    if (xhl.readyState == XMLHttpRequest.DONE) {
      location.replace("./index.php");
      //location.reload();
      console.log(xhl.responseText);
    }
  };

  //👇 send the data
  xhl.send(JSON.stringify(products));
};
