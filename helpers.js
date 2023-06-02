//Validate name field characters
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
      let res = xhr.responseText.charAt(2);
      if (res === "1") {
        location.reload();
      } else {
        alert("can't add product,Product Sku Already Exists");
      }
    }
  };

  //👇 send the data
  xhr.send(JSON.stringify(data));
};
