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
                    class="list-group list-group-flush border rounded mb-3 p-2 package-cont-hm"
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
                    <img id="barcode_`+ uniq_package_id +`_hm" width="150px" height="50px">
                    <input
                    class="form-control barcode_input"
                    type="hidden"
                    name="barcode[`+ uniq_package_id +`]"
                    value=""
                    />
                      <div class="row package-inputs-cont-hm">
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
                            <option value="1">envelop</option>
                          </select>
                        </div>
                        <div class="col-6 col-md">
                          <h6>Length:<span class="red">*</span></h6>
                          <div class="input-group mb-3">
                            <input
                              type="text"
                              class="form-control package-length-hm"
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
                              class="form-control package-width-hm"
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
                              class="form-control package-height-hm"
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
                              class="form-control package-weight-cnt"
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
                            <input
                              class="form-control boxCount"
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
                              class="form-control weight-cnt"
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
                            class="form-control product-price-hm"
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
    generateBarcode(uniq_package_id);
    uniq_package_id = Math.random().toString(36).substr(2, 9);
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
                            <input
                              class="form-control boxCount"
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
                              class="form-control weight-cnt"
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
                            class="form-control product-price-hm"
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

function yekunHesabla() {
    var packages = document.querySelectorAll(".package-cont-hm");

    // all calculations inside packages
    if (packages) {
        var total_weight = 0;
        var total_count = 0;
        var total_volume = 0;
        var total_deci = 0;
        var total_worth = 0;
        packages.forEach((package) => {
            var package_weight = parseInt(
                package.querySelector(".package-weight-cnt").value
            );
            var products = package.querySelectorAll(".product-inputs-cont-hm");

            var package_count = parseInt(
                package.querySelector(".package-inputs-cont-hm .boxCount").value
            );

            // Calculating total weight of packages and products
            var product_weight_package_total = 0;
            var product_count_package_total = 0;
            var total_product_price = 0;
            products.forEach((product) => {
                var product_weight = parseInt(
                    product.querySelector(".weight-cnt").value
                );
                var product_count = parseInt(
                    product.querySelector(".boxCount").value
                );
                if (product_weight) {
                    product_weight_package_total +=
                        product_weight * product_count;
                } else {
                    product_weight_package_total = 0;
                }
                if (product_count) {
                    product_count_package_total += product_count;
                } else {
                    product_count_package_total = 0;
                }

                var product_price =
                    parseInt(product.querySelector(".product-price-hm").value) *
                    product_count;

                if (product_price) {
                    total_product_price += product_price;
                }
            });
            var package_total_weight = 0;
            if (package_count) {
                product_weight_package_total += package_weight;
                package_total_weight =
                    product_weight_package_total * package_count;
                total_weight += package_total_weight;

                total_count = package_count * product_count_package_total;
                total_worth += total_product_price * package_count;
            }

            // Calculating total volume
            var package_inputs = package.querySelector(
                ".package-inputs-cont-hm"
            );
            var length = parseInt(
                package_inputs.querySelector(".package-length-hm").value
            );
            var width = parseInt(
                package_inputs.querySelector(".package-width-hm").value
            );
            var height = parseInt(
                package_inputs.querySelector(".package-height-hm").value
            );
            var count = parseInt(
                package_inputs.querySelector(".boxCount").value
            );
            var package_volume = length * width * height * count;
            if (package_volume) {
                total_volume += package_volume;
                // Calculating deci for package
                var deci = Math.max(
                    package_volume / 5000,
                    package_total_weight
                );
                var package_deci_total = deci * count;
                total_deci += package_deci_total;
            }
        });
        document.querySelector(".totalWeight").innerHTML = total_weight;
        document.querySelector(".totalAmount").innerHTML = total_count;
        document.querySelector(".totalPricing").innerHTML = total_deci;
        document.querySelector(".totalVolume").innerHTML = total_volume;
        document.querySelector(".totalWorth").innerHTML = total_worth;
        document.querySelector("#total_cargo_price").value = total_worth;

        var country = document.querySelector('select[name="country"]').value;

        if (total_deci > 0 && country) {
            $.ajax({
                type: "POST",
                url: "/userpanel/getquotemanualorder",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    total_worth: total_worth,
                    total_count: total_count,
                    total_weight: total_weight,
                    total_volume: total_volume,
                    total_deci: total_deci,
                    country: country,
                },
                success: function (data) {
                    console.log(data);
                    var companies = Object.keys(data);
                    companies.forEach((element) => {
                        document.querySelector(
                            "#cargo_company_" + element
                        ).innerHTML = data[element] + " $ ";
                        document
                            .querySelector("#cargo_company_input_" + element)
                            .setAttribute("data-price", data[element]);
                    });
                    Swal.fire({
                        position: "top-start",
                        icon: "success",
                        title: "Cargo company values calculated. See in Shipment definition",
                        showConfirmButton: false,
                        backdrop: true,
                        timer: 3000,
                    });
                },
            });
        } else {
            Swal.fire({
                position: "top-start",
                icon: "error",
                title: "Please enter country information and cargo details to calculate total price",
                showConfirmButton: false,
                backdrop: true,
                timer: 3000,
            });
        }
    }
}

function ChangeOrderInfo(input) {
    var product_names = document.querySelectorAll(".product-info-hm");
    document.querySelector('input[name="order_info"]').value = "";

    product_names.forEach((element) => {
        document.querySelector('input[name="order_info"]').value +=
            element.value + " , ";
    });
}

function generateBarcode(uniq_package_id){
    JsBarcode("#barcode_"+uniq_package_id+"_hm", uniq_package_id);
    document.querySelector("#barcode_"+uniq_package_id+"_hm").setAttribute('width' , '150px');
    document.querySelector("#barcode_"+uniq_package_id+"_hm").setAttribute('height' , '70px');

    var image_src = document.querySelector("#barcode_"+uniq_package_id+"_hm").getAttribute('src');

    document.querySelector("input[name='barcode["+uniq_package_id+"]']").value = image_src;
}
