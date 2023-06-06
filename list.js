"use strict";
import * as helper from "./helpers.js";

const addbtn = document.getElementById("btnadd");

addbtn.addEventListener("click", function () {
  location.replace("./index.php");
});

window.addEventListener("load", (event) => {
  // console.log("sdabasd");
  helper.getProducts();
});
