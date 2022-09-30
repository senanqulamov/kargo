let yeniPaketYarat = document.querySelector(".paketYaradilanYer");
// Yeni paket yaratmaq
var product_id = 1;
var uniq_package_id = Math.floor(10000000 + Math.random() * 90000000);

var default_package_hidden = document.querySelector(".default_package");
default_package_hidden.setAttribute("value", uniq_package_id);

function yeniPaketElaveEt() {
    uniq_package_id = Math.floor(10000000 + Math.random() * 90000000);
    let yeniPaket =
        ` <ul
                    class="list-group list-group-flush border rounded mb-3 p-2 package-cont-` +
        uniq_package_id +
        `"
                  >
                    <h4><i class="fa-solid fa-box commonIcon"></i> Package</h4>
                    <li class="list-group-item">
                        <input
                            class="form-control uniq_package_id"
                            type="hidden"
                            name="package_id[]"
                            id="uniq_package_id"
                            value="` +
        uniq_package_id +
        `"
                          />
                    <img id="barcode_` +
        uniq_package_id +
        `_hm" width="150px" height="50px">
                    <input
                    class="form-control barcode_input"
                    type="hidden"
                    name="barcode[` +
        uniq_package_id +
        `]"
                    value=""
                    />
                      <div class="row package-inputs-cont-hm">
                        <div class="col-6 col-md">
                          <h6>Count:<span class="red">*</span></h6>
                          <input onchange="MultiplyPackageCount(\'` +
        uniq_package_id +
        `\')"
                            class="form-control boxCount package-count-` +
        uniq_package_id +
        `"
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
                            onchange="checkPackageType(this , ` +
        uniq_package_id +
        `)"
                            name="package_type[` +
        uniq_package_id +
        `]"
                          >
                            <option selected>box</option>
                            <option value="envelop">envelop</option>
                          </select>
                        </div>
                        <div class="col-6 col-md">
                          <h6>Length:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input onchange="CalculateVolume(\'` +
        uniq_package_id +
        `\')"
                              type="text"
                              class="form-control package-length"
                              placeholder="15"
                              name="package_length[` +
        uniq_package_id +
        `]"
                            />
                            <span class="input-group-text" id="basic-addon1"
                              >cm</span
                            >
                          </div>
                        </div>
                        <div class="col-6 col-md">
                          <h6>Width:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input onchange="CalculateVolume(\'` +
        uniq_package_id +
        `\')"
                              type="text"
                              class="form-control package-width"
                              placeholder="15"
                              name="package_width[` +
        uniq_package_id +
        `]"
                            />
                            <span class="input-group-text" id="basic-addon1"
                              >cm</span
                            >
                          </div>
                        </div>
                        <div class="col-6 col-md package-height-holder-hm">
                          <h6>Height:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input onchange="CalculateVolume(\'` +
        uniq_package_id +
        `\')"
                              type="text"
                              class="form-control package-height"
                              placeholder="15"
                              name="package_height[` +
        uniq_package_id +
        `]"
                            />
                            <span class="input-group-text" id="basic-addon1"
                              >cm</span
                            >
                          </div>
                        </div>
                        <div class="col-6 col-md">
                          <h6>Weight:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input onchange="CalculateWeight(\'` +
        uniq_package_id +
        `\')"
                              type="text"
                              class="form-control package_weight_` +
        uniq_package_id +
        `"
                              placeholder="2"
                              name="package_weight[` +
        uniq_package_id +
        `]"
                            />
                            <span class="input-group-text" id="basic-addon1"
                              >kg</span
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
                          + Add another product
                        </button>
                      </h4>
                      <div class="row product-inputs-cont-hm">
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
                            onchange="ChangeOrderInfo(this)"
                            class="form-control product-info-hm"
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
                            <input onchange="CalculateCount(\'` +
        uniq_package_id +
        `\')"
                              class="form-control product-count "
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
                          <h6>Unit Weight</h6>
                          <div class="input-group">
                            <input onchange="CalculateWeight(\'` +
        uniq_package_id +
        `\')"
                              type="text"
                              class="form-control product-weight "
                              placeholder="2"
                              name="weight[` +
        uniq_package_id +
        `][` +
        product_id +
        `]"
                            />
                            <span class="input-group-text" id="basic-addon1"
                              >kg</span
                            >
                          </div>
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Unit Price<span class="red">*</span></h6>
                          <input onchange="CalculateWorth(\'` +
        uniq_package_id +
        `\')"
                            class="form-control product-price"
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
                            <h6 class="ttp" data-ttp="https://uygulama.gtb.gov.tr/Tara">
                                GTIP Code
                                <a href="https://uygulama.gtb.gov.tr/Tara">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                            </h6>
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
    generateBarcode(uniq_package_id);
    uniq_package_id = Math.floor(10000000 + Math.random() * 90000000);
}

// Yeni product yaratmaq
function yeniProductElaveEt(e) {
    var package = e.parentElement.parentElement.parentElement;
    uniq_package = package.querySelector("#uniq_package_id");
    package_id = uniq_package.value;
    console.log(uniq_package.value);

    let yeniProduct =
        `<div class="row product-inputs-cont-hm">
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
                            onchange="ChangeOrderInfo(this)"
                            class="form-control product-info-hm"
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
                            <input onchange="CalculateCount(\'` +
        package_id +
        `\')"
                              class="form-control product-count "
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
                          <h6>Unit Weight</h6>
                          <div class="input-group">
                            <input onchange="CalculateWeight(\'` +
        package_id +
        `\')"
                              type="text"
                              class="form-control product-weight "
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
                              >kg</span
                            >
                          </div>
                        </div>
                        <div class="col-6 col-md mb-3">
                          <h6>Unit Price<span class="red">*</span></h6>
                          <input onchange="CalculateWorth(\'` +
        package_id +
        `\')"
                            class="form-control product-price"
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
                            <h6 class="ttp" data-ttp="https://uygulama.gtb.gov.tr/Tara">
                                GTIP Code
                                <a href="https://uygulama.gtb.gov.tr/Tara">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                            </h6>
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

function ChangeOrderInfo(input) {
    var product_names = document.querySelectorAll(".product-info-hm");
    document.querySelector('input[name="order_info"]').value = "";

    product_names.forEach((element) => {
        document.querySelector('input[name="order_info"]').value +=
            element.value + " , ";
    });
}

function generateBarcode(uniq_package_id) {
    JsBarcode("#barcode_" + uniq_package_id + "_hm", uniq_package_id);
    document
        .querySelector("#barcode_" + uniq_package_id + "_hm")
        .setAttribute("width", "150px");
    document
        .querySelector("#barcode_" + uniq_package_id + "_hm")
        .setAttribute("height", "70px");

    var image_src = document
        .querySelector("#barcode_" + uniq_package_id + "_hm")
        .getAttribute("src");

    document.querySelector(
        "input[name='barcode[" + uniq_package_id + "]']"
    ).value = image_src;
}
