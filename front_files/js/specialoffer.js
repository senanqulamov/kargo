


let quantity = (document.querySelector(".getSpecialQuantity").value = "1");
function minus() {
  if (quantity > 1) {
    quantity--;
    document.querySelector(".getSpecialQuantity").value = quantity;
  }
}
function plus() {
  quantity++;
  document.querySelector(".getSpecialQuantity").value = quantity;
}

let quantity1 = (document.querySelector(".getSpecialQuantity1").value = "1");
function minus1() {
  if (quantity1 > 1) {
    quantity1--;
    document.querySelector(".getSpecialQuantity1").value = quantity1;
  }
}
function plus1() {
  quantity1++;
  document.querySelector(".getSpecialQuantity1").value = quantity1;
}

// date input js code
$(function () {
  $("#datepicker").datepicker({
    dateFormat: "dd-mm-yy",
    duration: "fast",
  });
});

// radio input change menu
function menuChange() {
  if (document.querySelector("#r3").checked) {
    document.querySelector(".specialOfferAir").classList.remove("content");
    document.querySelector(".specialOffer").classList.add("content");
  } else {
    document.querySelector(".specialOfferAir").classList.add("content");
    document.querySelector(".specialOffer").classList.remove("content");
  }
}

























