let yeniPaketYarat = document.querySelector(".paketYaradilanYer");
// Yeni paket yaratmaq
var product_id = 1;
var uniq_package_id = Math.random().toString(36).substr(2, 9);

var default_package_hidden = document.querySelector(".default_package");
default_package_hidden.setAttribute("value", uniq_package_id);

function yeniPaketElaveEt() {
    uniq_package_id = Math.random().toString(36).substr(2, 9);
    let yeniPaket =
        ` <ul
                    class="list-group list-group-flush border rounded mb-3 p-2"
                  >
                    <h4><i class="fa-solid fa-box commonIcon"></i> Package</h4>
                    <li class="list-group-item">
                        <input
                            class="form-control"
                            type="hidden"
                            name="package_id[]"
                            id="uniq_package_id"
                            value="` +
        uniq_package_id +
        `"
                          />
                      <div class="row">
                        <div class="col-6 col-md">
                          <h6>Count:<span class="red">*</span></h6>
                          <input
                            class="form-control boxCount"
                            type="text"
                            placeholder="1"
                            name="package_count[` +
        uniq_package_id +
        `]"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Type:<span class="red">*</span></h6>
                          <select
                            class="form-select"
                            name="package_type[` +
        uniq_package_id +
        `]"
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
                              name="package_length[` +
        uniq_package_id +
        `]"
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
                              name="package_width[` +
        uniq_package_id +
        `]"
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
                              name="package_height[` +
        uniq_package_id +
        `]"
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
                              name="package_weight[` +
        uniq_package_id +
        `]"
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
                            type="button"
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
                          type="button"
                        >
                          + Add another products
                        </button>
                      </h4>
                      <div class="row">
                        <input
                            class="form-control"
                            type="hidden"
                            name="product_id[` +
        uniq_package_id +
        `][]"
                            value="` +
        product_id +
        `"
                          />
                        <div class="col-6 col-md mb-3">
                          <h6>SKU Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            name="sku_code[` +
        uniq_package_id +
        `][` +
        product_id +
        `]"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Product<span class="red">*</span></h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="Clock"
                            name="product[` +
        uniq_package_id +
        `][` +
        product_id +
        `]"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Count<span class="red">*</span></h6>
                          <div class="input-group">
                            <input
                              class="form-control"
                              type="text"
                              placeholder="1 (Storage 3)"
                              name="count[` +
        uniq_package_id +
        `][` +
        product_id +
        `]"
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
                              name="weight[` +
        uniq_package_id +
        `][` +
        product_id +
        `]"
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
                            name="price[` +
        uniq_package_id +
        `][` +
        product_id +
        `]"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>GTIP Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            name="gtip_code[` +
        uniq_package_id +
        `][` +
        product_id +
        `]"
                          />
                        </div>
                        <div class="col d-flex align-items-center">
                          <button
                            class="btn btn-danger"
                            onclick="silProduct(this)"
                            type="button"
                          >
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
                      </div>
                    </li>
                  </ul>`;

    yeniPaketYarat.insertAdjacentHTML("beforeend", yeniPaket);
    product_id++;
    uniq_package_id = Math.random().toString(36).substr(2, 9);
}

// Yeni product yaratmaq
function yeniProductElaveEt(e) {
    var package = e.parentElement.parentElement.parentElement;
    uniq_package = package.querySelector("#uniq_package_id");
    package_id = uniq_package.value;
    console.log(uniq_package.value);

    let yeniProduct =
        `<div class="row ">
                        <input
                            class="form-control"
                            type="hidden"
                            name="product_id[` +
        package_id +
        `][]"
                            value="` +
        product_id +
        `"
                          />
                        <div class="col-6 col-md mb-3">
                          <h6>SKU Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            aria-label="default input example"
                            name="sku_code[` +
        package_id +
        `][` +
        product_id +
        `]"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Product<span class="red">*</span></h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="Clock"
                            aria-label="default input example"
                            name="product[` +
        package_id +
        `][` +
        product_id +
        `]"
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
                              name="count[` +
        package_id +
        `][` +
        product_id +
        `]"
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
                              name="weight[` +
        package_id +
        `][` +
        product_id +
        `]"
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
                            name="price[` +
        package_id +
        `][` +
        product_id +
        `]"
                          />
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>GTIP Code</h6>
                          <input
                            class="form-control"
                            type="text"
                            placeholder="12345"
                            aria-label="default input example"
                            name="gtip_code[` +
        package_id +
        `][` +
        product_id +
        `]"
                          />
                        </div>
                        <div class="col d-flex align-items-center">
                          <button
                            class="btn btn-danger"
                            onclick="silProduct(this)"
                            type="button"
                          >
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </div>
                      </div>
                      <br/>`;

    let yeniProductYarat = e.parentElement;
    yeniProductYarat.insertAdjacentHTML("beforeend", yeniProduct);
    product_id++;
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
