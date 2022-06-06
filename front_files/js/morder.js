let yeniPaketYarat = document.querySelector(".paketYaradilanYer");
// Yeni paket yaratmaq
function yeniPaketElaveEt() {
  let yeniPaket = ` <ul
                    class="list-group list-group-flush border rounded mb-3 p-2"
                  >
                    <h4><i class="fa-solid fa-box commonIcon"></i> Package</h4>
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-6 col-md">
                          <h6>Count:<span class="red">*</span></h6>
                          <input
                            class="form-control boxCount"
                            type="text"
                            placeholder="1"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Type:<span class="red">*</span></h6>
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
                          <h6>Length:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input
                              type="text"
                              class="form-control"
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
                          <h6>Width:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input
                              type="text"
                              class="form-control"
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
                          <h6>Height:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input
                              type="text"
                              class="form-control"
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
                          <h6>Weight:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
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
                        <div
                          class="col-1 d-flex align-items-center justify-content-center"
                        >
                          <button
                            class="btn btn-danger"
                            onclick="silPaket(this)"
                          >
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
                      </div>
                    </li>
                    <!-- product -->
                    <li class="list-group-item ms-3 row productYaradilanYer">
                      <h4>
                        <i class="fa-solid fa-box commonIcon"></i> Products
                        <button
                          class="btn btn-primary my-3 mx-3"
                          onclick="yeniProductElaveEt(this)"
                        >
                          + Add another products
                        </button>
                      </h4>
                      <div class="row">
                        <div class="col-6 col-md mb-3">
                          <h6>SKU Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Product<span class="red">*</span></h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="Clock"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Count<span class="red">*</span></h6>
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
                          <h6>Unit Weight<span class="red">*</span></h6>
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
                          <h6>Unit Price<span class="red">*</span></h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="200"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>GTIP Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col d-flex align-items-center">
                          <button
                            class="btn btn-danger"
                            onclick="silProduct(this)"
                          >
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
                      </div>
                    </li>
                  </ul>`;

  yeniPaketYarat.insertAdjacentHTML("beforeend", yeniPaket);
}

// Yeni product yaratmaq

function yeniProductElaveEt(e) {
  let yeniProduct = `<div class="row ">
                        <div class="col-6 col-md mb-3">
                          <h6>SKU Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Product<span class="red">*</span></h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="Clock"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Count<span class="red">*</span></h6>
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
                          <h6>Unit Weight<span class="red">*</span></h6>
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
                          <h6>Unit Price<span class="red">*</span></h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="200"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>GTIP Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            aria-label="default input example"
                          />
                        </div>
                        <div class="col d-flex align-items-center">
                          <button
                            class="btn btn-danger"
                            onclick="silProduct(this)"
                          >
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
                      </div>`;

  let yeniProductYarat = e.parentElement;
  yeniProductYarat.insertAdjacentHTML("beforeend", yeniProduct);
}

// paket silmek

function silPaket(e) {
  e.parentElement.parentElement.parentElement.parentElement.remove();
}

// product silmek

function silProduct(e) {
  e.parentElement.parentElement.remove();
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