"use strict";
import * as helper from "./helpers.js";

//Requiring All needed HTML elements
const selectedType = document.querySelector("#producttype");
const bookweightbox = document.querySelector(".weightbox");
const furniturebox = document.querySelector(".dimensionsbox");
const discbox = document.querySelector(".sizebox");
const allboxes = document.querySelector(".boxes");
const select = document.getElementById("productType");
const adding = document.getElementById("product_form");
const sku = document.getElementById("sku");
const name = document.getElementById("name");
const price = document.getElementById("price");
const type = document.getElementById("type");
const size = document.getElementById("size");
const weight = document.getElementById("weight");
const height = document.getElementById("height");
const width = document.getElementById("width");
const length = document.getElementById("length");
const cancel = document.getElementById("btncancel");

select.addEventListener("change", function () {
  let value = select.options[select.selectedIndex].value;
  if (value === "Book") {
    discbox.style.display = "none";
    size.value = "";
    height.value = "";
    length.value = "";
    width.value = "";
    furniturebox.style.display = "none";
    bookweightbox.style.display = "block";
    bookweightbox.style.position = "absolute";
  }
  if (value === "Furniture") {
    size.value = "";
    weight.value = "";
    bookweightbox.style.display = "none";
    discbox.style.display = "none";

    furniturebox.style.display = "block";
    furniturebox.style.position = "absolute";
  }
  if (value === "Disc") {
    bookweightbox.style.display = "none";
    weight.value = "";
    height.value = "";
    length.value = "";
    width.value = "";
    furniturebox.style.display = "none";
    discbox.style.display = "block";
    discbox.style.position = "absolute";
  } else if (value === "none") {
    discbox.style.display = "none";
    furniturebox.style.display = "none";
    bookweightbox.style.display = "none";
  }
});

//Submitting the ADD request
adding.addEventListener("submit", function (e) {
  e.preventDefault();
  let myvalue = select.options[select.selectedIndex].value;
  let spec = [];

  if (
    sku.value === "" ||
    name.value === "" ||
    price.value === "" ||
    !select.selectedIndex
  ) {
    alert("Please submit All  required Data ");
    return;
  }

  if (!helper.validateName(name.value)) {
    alert("Please input alphabet characters only in name ");
    return;
  }
  if (!helper.isNumber(price.value)) {
    alert("Please input number only in price and Type specification fields");
    return;
  }

  if (myvalue === "Book") {
    if (helper.isNumber(weight.value)) {
      spec.push(weight.value);
    } else {
      alert("Please add numeric values in the Weight Field ");
      return;
    }
  }

  if (myvalue === "Disc") {
    if (helper.isNumber(size.value)) spec.push(size.value);
    else {
      alert("Please add numeric values in the Size Field ");
      return;
    }
  }

  if (myvalue === "Furniture") {
    if (
      helper.isNumber(height.value) &&
      helper.isNumber(width.value) &&
      helper.isNumber(length.value)
    )
      spec.push(height.value, width.value, length.value);
    else {
      alert("Please add numeric values in the Dimensions Fields HxWXL ");
      return;
    }
  }
  helper.saveProduct(sku.value, name.value, price.value, myvalue, spec);
});

cancel.addEventListener("click", function () {
  location.replace("./index2.php");
});