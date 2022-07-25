

let yeniPaketYarat = document.querySelector(".paketYaradilanYer");
let shadowbox__1 = document.querySelector('.shadowBox--1')
let shadowbox__2 = document.querySelector('.shadowBox--2')

let dataBoxs = document.querySelectorAll('.shadowBox')



shadowbox__1.addEventListener('click',function(){
  shadowbox__1.children[0].children[1].children[0].click()
})

shadowbox__2.addEventListener('click',function(){
  shadowbox__2.children[0].children[1].children[0].click()
})





// function clickContainer(){
//   shadowbox__1.children[1].click()
//   shadowbox__2.children[1].click()
// }


// shadowbox__1.addEventListener('click',function(){
//   shadowbox__1.children[1].clicked
// })
// shadowbox__2.addEventListener('click',function(){
//   shadowbox__2.children[1].clicked
// })



// Yeni paket yaratmaq
function yeniPaketElaveEt() {
  let yeniPaket = ` 
  <div class="list-group-item paketYaradilanYer">
  <!-- JS paket kodu -->
  <div
    class="list-group list-group-flush border rounded mb-3 p-2 shadowBox"
  >
    <div class="d-flex align-items-center">
      <div class="iconBG me-3">
        <i class="fa-solid fa-box text-white"></i>
      </div>
      <h4 class="amazonCalcTextHeader">Package</h4>
    </div>
    <div class="list-group-item">
      <div class="row">
        <div class="col-6 col-md">
          <h6 class="amazonCalcText">
            Count:<span class="red">*</span>
          </h6>
          <input
            class="form-control boxCount"
            type="text"
            placeholder="1"
            aria-label="default input example"
          />
        </div>
        <div class="col-6 col-md mb-3">
          <h6 class="amazonCalcText">
            Type:<span class="red">*</span>
          </h6>
          <select
            class="form-select"
            aria-label="Default select example"
          >
            <option selected>box</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="col-6 col-md">
          <h6 class="amazonCalcText">
            Length:<span class="red">*</span>
          </h6>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control boxVolume"
              placeholder="15"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
            <span class="input-group-text" id="basic-addon1"
              >sm</span
            >
          </div>
        </div>
        <div class="col-6 col-md">
          <h6 class="amazonCalcText">
            Width:<span class="red">*</span>
          </h6>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control boxVolume"
              placeholder="15"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
            <span class="input-group-text" id="basic-addon1"
              >sm</span
            >
          </div>
        </div>
        <div class="col-6 col-md">
          <h6 class="amazonCalcText">
            Height:<span class="red">*</span>
          </h6>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control boxVolume"
              placeholder="15"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
            <span class="input-group-text" id="basic-addon1"
              >sm</span
            >
          </div>
        </div>
        <div class="col-6 col-md">
          <h6 class="amazonCalcText">
            Weight:<span class="red">*</span>
          </h6>
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control boxWeight"
              placeholder="2"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
            <span class="input-group-text" id="basic-addon1"
              >kq</span
            >
          </div>
        </div>
        <div
          class="col-12 col-md-1 d-flex align-items-center justify-content-end"
        >
          <button
            class="btn btn-danger shadowBox px-3 py-2"
            onclick="silPaket(this)"
          >
            <i class="fa-solid fa-trash-can"></i>
          </button>
        </div>
      </div>
    </div>
    <!-- product -->
    <div
      class="list-group-item ms-3 productYaradilanYer mt-3"
    >
      <div class="d-flex align-items-center">
        <div class="d-flex align-items-center">
          <div class="iconBG me-3">
            <i class="fa-solid fa-box text-white"></i>
          </div>
          <h4 class="amazonCalcTextHeader">Product</h4>
        </div>
        <div class="">
          <button
            class="productBtn my-3 mx-3"
            onclick="yeniProductElaveEt(this)"
          >
            + Add another products
          </button>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-6 col-md">
          <h6 class="amazonCalcText">SKU Code</h6>
          <input
            class="form-control"
            type="text"
            placeholder="12345"
            aria-label="default input example"
          />
        </div>
        <div class="col-6 col-md mb-3">
          <h6 class="amazonCalcText">
            Product<span class="red">*</span>
          </h6>
          <input
            class="form-control"
            type="text"
            placeholder="Clock"
            aria-label="default input example"
          />
        </div>
        <div class="col-6 col-md mb-3">
          <h6 class="amazonCalcText">
            Count<span class="red">*</span>
          </h6>
          <div class="input-group">
            <input
              class="form-control"
              type="text"
              placeholder="1 (Storage 3)"
              aria-label="default input example"
            />
          </div>
        </div>
        <div class="col-6 col-md mb-3">
          <h6 class="amazonCalcText">
            Unit Weight<span class="red">*</span>
          </h6>
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="2"
              aria-label="Username"
              aria-describedby="basic-addon1"
            />
            <span class="input-group-text" id="basic-addon1"
              >kq</span
            >
          </div>
        </div>
        <div class="col-6 col-md mb-3">
          <h6 class="amazonCalcText">
            Unit Price<span class="red">*</span>
          </h6>
          <input
            class="form-control"
            type="text"
            placeholder="200"
            aria-label="default input example"
          />
        </div>
        <div class="col-6 col-md mb-3">
          <h6 class="amazonCalcText">GTIP Code</h6>
          <input
            class="form-control"
            type="text"
            placeholder="12345"
            aria-label="default input example"
          />
        </div>
        <div
          class="col d-flex align-items-center justify-content-md-center justify-content-end"
        >
          <button
            class="btn btn-danger shadowBox px-3 py-2"
            onclick="silProduct(this)"
          >
            <i class="fa-solid fa-trash-can"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
  `;

  yeniPaketYarat.insertAdjacentHTML("beforeend", yeniPaket);
}

// Yeni product yaratmaq

function yeniProductElaveEt(e) {
  let yeniProduct = `
  <div
  class="list-group-item ms-3 productYaradilanYer mt-3"
>
  <div class="d-flex align-items-center">
    <div class="d-flex align-items-center">
      <div class="iconBG me-3">
        <i class="fa-solid fa-box text-white"></i>
      </div>
      <h4 class="amazonCalcTextHeader">Product</h4>
    </div>
    <div class="">
      <button
        class="productBtn my-3 mx-3"
        onclick="yeniProductElaveEt(this)"
      >
        + Add another products
      </button>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-6 col-md">
      <h6 class="amazonCalcText">SKU Code</h6>
      <input
        class="form-control"
        type="text"
        placeholder="12345"
        aria-label="default input example"
      />
    </div>
    <div class="col-6 col-md mb-3">
      <h6 class="amazonCalcText">
        Product<span class="red">*</span>
      </h6>
      <input
        class="form-control"
        type="text"
        placeholder="Clock"
        aria-label="default input example"
      />
    </div>
    <div class="col-6 col-md mb-3">
      <h6 class="amazonCalcText">
        Count<span class="red">*</span>
      </h6>
      <div class="input-group">
        <input
          class="form-control"
          type="text"
          placeholder="1 (Storage 3)"
          aria-label="default input example"
        />
      </div>
    </div>
    <div class="col-6 col-md mb-3">
      <h6 class="amazonCalcText">
        Unit Weight<span class="red">*</span>
      </h6>
      <div class="input-group">
        <input
          type="text"
          class="form-control"
          placeholder="2"
          aria-label="Username"
          aria-describedby="basic-addon1"
        />
        <span class="input-group-text" id="basic-addon1"
          >kq</span
        >
      </div>
    </div>
    <div class="col-6 col-md mb-3">
      <h6 class="amazonCalcText">
        Unit Price<span class="red">*</span>
      </h6>
      <input
        class="form-control"
        type="text"
        placeholder="200"
        aria-label="default input example"
      />
    </div>
    <div class="col-6 col-md mb-3">
      <h6 class="amazonCalcText">GTIP Code</h6>
      <input
        class="form-control"
        type="text"
        placeholder="12345"
        aria-label="default input example"
      />
    </div>
    <div
      class="col d-flex align-items-center justify-content-md-center justify-content-end"
    >
      <button
        class="btn btn-danger shadowBox px-3 py-2"
        onclick="silProduct(this)"
      >
        <i class="fa-solid fa-trash-can"></i>
      </button>
    </div>
  </div>
</div>
  
  `;

  let yeniProductYarat =
    e.parentElement.parentElement.parentElement.parentElement;
  yeniProductYarat.insertAdjacentHTML("beforeend", yeniProduct);
}

// paket silmek

function silPaket(e) {
  e.parentElement.parentElement.parentElement.parentElement.remove();
}

// product silmek

function silProduct(e) {
  e.parentElement.parentElement.parentElement.remove();
}

// total amount function
let box = document.querySelectorAll(".boxCount");
let totalAmount = document.querySelector(".totalAmount");
let boxVolume = document.querySelectorAll(".boxVolume");
let totalVolume = document.querySelector(".totalVolume");
let boxWeight = document.querySelectorAll(".boxWeight");
let totalWeight = document.querySelector(".totalWeight");
let totalPricing = document.querySelector(".totalPricing");
//console.log(box);
function yekunHesabla() {
  let cem = 0;
  let volume = 1;
  let weight = 1;
  for (let qutu of box) {
    cem += Number(`${qutu.value}`);
  }
  totalAmount.innerHTML = `${cem} box`;

  for (let vol of boxVolume) {
    volume = volume * (Number(`${vol.value}`) / 100);
  }
  totalVolume.innerHTML = `${volume.toFixed(3)} m`;

  for (let kq of boxWeight) {
    weight = weight * Number(`${kq.value}`);
    console.loge;
  }
  totalWeight.innerHTML = `${weight} kq`;

  if (weight > volume.toFixed(3) / 500) {
    totalPricing.innerHTML = `${weight} kq`;
  } else {
    totalPricing.innerHTML = `${volume.toFixed(3)} m`;
  }
}

// clicked

function clicked(e) {
  let item = e.children[0].children[2].children[1].children[0];
  item.click();
}

// clicked

// function clicked1(e) {
//   let item = e.children[0].children[0].children[0].children[0];
//   item.click();
//   console.log(item);
// }















