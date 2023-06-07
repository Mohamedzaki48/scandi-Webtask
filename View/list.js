"use strict";
import * as helper from "./helpers.js";

const addbtn = document.getElementById("btnadd");
const deletebtn = document.getElementById("delete-product-btn");
const checkboxes = document.getElementsByClassName("delete-checkbox");
const remove = document.getElementById("delete");

addbtn.addEventListener("click", function () {
  window.location.replace("./index2.php");
});

window.addEventListener("load", (event) => {
  event.preventDefault();
  helper.getProducts();
});

remove.addEventListener("submit", (event) => {
  event.preventDefault();
  let choosenProducts = [];
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      choosenProducts.push(checkboxes[i].value);
    }
  }
  if (choosenProducts.length === 0) alert("No products were selected");
  else {
    helper.deleteProducts(choosenProducts);
  }
});
