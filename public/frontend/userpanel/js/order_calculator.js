// setTimeout(() => {
//     console.clear();
// }, 1000);

//--------------------------- CALCULATING TOTAL COUNT starts here--------------------------->
var total_count = 0;
var counts_array = [];

function CalculateCount(package_id) {
    MultiplyPackageCount(package_id);
}
function MultiplyPackageCount(package_id) {
    var package_count = parseInt(
        document.querySelector(".package-count-" + package_id).value
    );
    var package = document.querySelector(".package-cont-" + package_id);
    var product_countS = package.querySelectorAll(".product-count");
    var total = 0;
    for (i = 0; i < product_countS.length; i++) {
        total += parseInt(product_countS[i].value);
    }

    if (isNaN(total)) {
        counts_array[package_id] = 0;
    } else {
        if (package_count > 0) {
            counts_array[package_id] = total * package_count;
        } else {
            package_count = 0;
            counts_array[package_id] = total * package_count;
        }
    }

    SumCounts(Object.values(counts_array));
    MultiplyPackageWeight(package_id);
    MultiplyPackageWorth(package_id);
    MultiplyPackageVolume(package_id);
    CalculateDeci(package_id);
}
function SumCounts(array) {
    array.forEach((element) => {
        total_count += element;
    });
    document.querySelector(".totalAmount").innerHTML = total_count;
    document.querySelector('input[name="total_count"]').value = total_count;
    total_count = 0;
}
//--------------------------- CALCULATING TOTAL COUNT ends here--------------------------->

//--------------------------- CALCULATING Total weight starts here--------------------------->
var total_weight = 0;
var weights_array = [];
function CalculateWeight(package_id) {
    MultiplyPackageWeight(package_id);
}
function MultiplyPackageWeight(package_id) {
    var package_weight = parseInt(
        document.querySelector(".package_weight_" + package_id).value
    );
    var package_count = parseInt(
        document.querySelector(".package-count-" + package_id).value
    );
    // var package = document.querySelector(".package-cont-" + package_id);
    // var product_weightS = package.querySelectorAll(".product-weight");
    // var product_countS = package.querySelectorAll(".product-count");
    // var total = 0;
    // for (i = 0; i < product_weightS.length; i++) {
    //     if (
    //         parseInt(product_weightS[i].value) > 0 &&
    //         parseInt(product_countS[i].value) > 0
    //     ) {
    //         total +=
    //             parseInt(product_weightS[i].value) *
    //             parseInt(product_countS[i].value);
    //     }
    // }

    if (isNaN(package_weight)) {
        weights_array[package_id] = 0;
    } else {
        if (package_weight > 0 && package_count > 0) {
            weights_array[package_id] = package_weight * package_count;
        } else {
            package_weight = 0;
            package_count = 1;
            weights_array[package_id] = package_weight * package_count;
        }
    }
    // console.log(weights_array);
    SumWeights(Object.values(weights_array));
    CalculateDeci(package_id);
}
function SumWeights(array) {
    array.forEach((element) => {
        total_weight += element;
    });
    document.querySelector(".totalWeight").innerHTML = total_weight;
    document.querySelector('input[name="total_weight"]').value = total_weight;
    total_weight = 0;
}
//--------------------------- CALCULATING Total weight ends here--------------------------->

//--------------------------- CALCULATING TOTAL WORTH starts here--------------------------->
var total_worth = 0;
var worths_array = [];
function CalculateWorth(package_id) {
    MultiplyPackageWorth(package_id);
}
function MultiplyPackageWorth(package_id) {
    var package_count = parseInt(
        document.querySelector(".package-count-" + package_id).value
    );

    var package = document.querySelector(".package-cont-" + package_id);
    var product_priceS = package.querySelectorAll(".product-price");
    var product_countS = package.querySelectorAll(".product-count");
    var total = 0;
    for (i = 0; i < product_priceS.length; i++) {
        if (
            parseInt(product_priceS[i].value) > 0 &&
            parseInt(product_countS[i].value) > 0
        ) {
            total +=
                parseInt(product_priceS[i].value) *
                parseInt(product_countS[i].value);
        }
    }

    if (isNaN(total)) {
        worths_array[package_id] = 0;
    } else {
        if (package_count > 0) {
            worths_array[package_id] = total * package_count;
        } else {
            package_count = 0;
            worths_array[package_id] = total * package_count;
        }
    }

    SumWorths(Object.values(worths_array));
}
function SumWorths(array) {
    array.forEach((element) => {
        total_worth += element;
    });
    document.querySelector(".totalWorth").innerHTML = total_worth;
    document.querySelector('input[name="total_worth"]').value = total_worth;
    total_worth = 0;
}
//--------------------------- CALCULATING TOTAL WORTH ends here--------------------------->

//--------------------------- CALCULATING TOTAL VOLUME starts here--------------------------->
var total_volume = 0;
var total_deci = 0;
var volumes_array = [];
var decis_array = [];
function CalculateVolume(package_id) {
    MultiplyPackageVolume(package_id);
}
function MultiplyPackageVolume(package_id) {
    var package_count = parseInt(
        document.querySelector(".package-count-" + package_id).value
    );

    var package = document.querySelector(".package-cont-" + package_id);
    var product_lengthS = package.querySelectorAll(".package-length");
    var product_heightS = package.querySelectorAll(".package-height");
    var product_widthS = package.querySelectorAll(".package-width");
    var total = 0;
    for (i = 0; i < product_lengthS.length; i++) {
        if (
            parseInt(product_lengthS[i].value) > 0 &&
            parseInt(product_heightS[i].value) > 0 &&
            parseInt(product_widthS[i].value) > 0
        ) {
            total +=
                parseInt(product_lengthS[i].value) *
                parseInt(product_heightS[i].value) *
                parseInt(product_widthS[i].value);
        }
    }

    if (isNaN(total)) {
        volumes_array[package_id] = 0;
    } else {
        if (package_count > 0) {
            volumes_array[package_id] = total * package_count;
        } else {
            package_count = 0;
            volumes_array[package_id] = total * package_count;
        }
    }

    SumVolumes(Object.values(volumes_array));
    CalculateDeci(package_id);
}
function SumVolumes(array) {
    array.forEach((element) => {
        total_volume += element;
    });
    total_volume = total_volume / 1000000;
    document.querySelector(".totalVolume").innerHTML = total_volume;
    document.querySelector('input[name="total_volume"]').value = total_volume;
    total_volume = 0;
}

//--------------------------- CALCULATING TOTAL VOLUME edns here--------------------------->

//--------------------------- CALCULATING TOTAL DECI starts here--------------------------->
function CalculateDeci(package_id) {
    if (volumes_array[package_id] > 0 && weights_array[package_id] > 0) {
        decis_array[package_id] = Math.max(
            parseFloat(volumes_array[package_id]) / 5000,
            weights_array[package_id]
        );
    } else if (weights_array[package_id] == 0) {
        decis_array[package_id] = volumes_array[package_id] / 5000;
    } else {
        decis_array[package_id] = 0;
    }

    SumDecis(Object.values(decis_array));
}
function SumDecis(array) {
    array.forEach((element) => {
        total_deci += element;
    });
    document.querySelector(".totalPricing").innerHTML = total_deci;
    document.querySelector('input[name="total_deci"]').value = total_deci;
    total_deci = 0;
}
//--------------------------- CALCULATING TOTAL DECI edns here--------------------------->

function yekunHesabla(from_where) {
    var totalAmount = parseFloat(
        document.querySelector(".totalAmount").innerHTML
    ).toFixed(2);
    var totalWeight = parseFloat(
        document.querySelector(".totalWeight").innerHTML
    ).toFixed(2);
    var totalVolume = parseFloat(
        document.querySelector(".totalVolume").innerHTML
    ).toFixed(2);
    var totalDeci = parseFloat(
        document.querySelector(".totalPricing").innerHTML
    );
    var totalWorth = parseFloat(
        document.querySelector(".totalWorth").innerHTML
    ).toFixed(2);
    var country = document.querySelector('select[name="country"]').value;
    var ajax_url = document.querySelector("#ajax_url").value;

    var boxCounts = document.querySelectorAll(".boxCount");
    var total_box_count = 0;
    boxCounts.forEach((element) => {
        total_box_count += parseInt(element.value);
    });

    var insurance_input = document.querySelector("#insurance");
    var insurance_span = document.querySelector(".insurance_input_span");
    var insurance_price = parseFloat((15 * (totalWorth * 1.5)) / 100).toFixed(
        2
    );
    insurance_input.setAttribute("data-price", insurance_price);
    insurance_input.value = insurance_price;
    insurance_span.innerHTML = insurance_price + " €";

    if (country != "0" && totalDeci > 0) {
        $.ajax({
            type: "POST",
            url: ajax_url,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                total_worth: totalWorth,
                total_count: totalAmount,
                total_weight: totalWeight,
                total_volume: totalVolume,
                total_deci: totalDeci,
                country: country,
                total_box_count: total_box_count,
                total_product_count: totalAmount,
            },
            success: function (data) {
                console.log(data);
                var companies = Object.keys(data.cargo_companies);
                companies.forEach((element) => {
                    document.querySelector(
                        "#cargo_company_" + element
                    ).innerHTML =
                        parseFloat(data.cargo_companies[element]).toFixed(2) +
                        " € ";
                    document
                        .querySelector("#cargo_company_input_" + element)
                        .setAttribute(
                            "data-price",
                            parseFloat(data.cargo_companies[element]).toFixed(2)
                        );
                    document.querySelector(
                        'input[name="company_value[' + element + ']"]'
                    ).value = parseFloat(data.cargo_companies[element]).toFixed(
                        2
                    );
                });

                if (data.personal_array) {
                    var personal_companies = Object.values(data.personal_array);
                    var src_url = document.querySelector("#src_url").value;

                    personal_companies.forEach((element) => {
                        var personal_cargo_id = Math.floor(
                            10000000 + Math.random() * 90000000
                        );
                        var company_html =
                            `
                        <label for="personal_company_input_` +
                            element.id +
                            `" class="cargo-company-label" onclick="changePersonalCargo('`+element.name+`')">
                            <div class="list-group list-group-horizontal">
                                <div
                                    class="list-group-item w-25 text-center d-flex align-items-center">
                                    <img style="height:48px;"
                                        src="` +
                            src_url +
                            `backend/assets/img/companies/cargo/` +
                            element.logo +
                            `" />
                                </div>
                                <div class="list-group-item w-50 text-left d-flex align-items-center ">
                                    ` +
                            element.name +
                            `
                                </div>
                                <div class="list-group-item d-flex d-flex align-items-center">
                                    <span class="me-2 textShipment"
                                        id="cargo_company_` +
                            element.id +
                            `">` +
                            parseFloat(element.price).toFixed(2) +
                            ` €</span>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio"
                                            name="cargo_company"
                                            id="personal_company_input_` +
                            element.id +
                            `"
                                            data-price="` +
                            parseFloat(element.price).toFixed(2) +
                            `" value="` +
                            element.id +
                            `" />
                                        <input type="hidden"
                                            name="company_value[` +
                            element.id +
                            `]" value="` +
                            parseFloat(element.price).toFixed(2) +
                            `">
                                        <input type="hidden" name="personal_cargo_id[]" value="` +
                            personal_cargo_id +
                            `">
                                        <input type="hidden" name="personal_cargo_name[` +
                            personal_cargo_id +
                            `]" value="` +
                            element.name +
                            `">
                                        <input type="hidden" name="personal_cargo_value[` +
                            personal_cargo_id +
                            `]" value="` +
                            parseFloat(element.price).toFixed(2) +
                            `"></input>
                                    </div>
                                </div>
                            </div>
                        </label>
                        `;
                        console.log(company_html);
                        document
                            .querySelector(".cargo-company-labels-holder")
                            .insertAdjacentHTML("beforeend", company_html);
                        document.querySelector(
                            'input[name="personal_cargo"]'
                        ).value = "true";
                    });
                }

                var additional =
                    document.querySelectorAll(".cargo_price_input");
                var company = document.querySelector(
                    'input[name="cargo_company"]:checked'
                );
                var companies = document.querySelectorAll(
                    'input[name="cargo_company"]'
                );

                var total_additional = 0;
                var helper_additional = 0;
                var company_price = 0;

                additional.forEach((element) => {
                    element.addEventListener("change", function () {
                        additional.forEach((input) => {
                            if ($(input).is(":checked")) {
                                helper_additional += parseFloat(
                                    input.getAttribute("data-price")
                                );
                            }
                        });
                        total_additional = helper_additional;
                        helper_additional = 0;
                        document.querySelector(
                            'input[name="total_cargo_price"]'
                        ).value = (total_additional + company_price).toFixed(2);
                        document.querySelector(
                            "#total_cargo_price_span"
                        ).innerHTML = (
                            total_additional + company_price
                        ).toFixed(2);
                    });
                });

                companies.forEach((element) => {
                    element.addEventListener("change", function () {
                        console.log(companies);
                        company_price = parseFloat(
                            document
                                .querySelector(
                                    'input[name="cargo_company"]:checked'
                                )
                                .getAttribute("data-price")
                        );

                        document.querySelector(
                            'input[name="total_cargo_price"]'
                        ).value = (total_additional + company_price).toFixed(2);
                        document.querySelector(
                            "#total_cargo_price_span"
                        ).innerHTML = (
                            total_additional + company_price
                        ).toFixed(2);
                    });
                });

                var services = Object.keys(data.additional_services);
                console.log(services);
                services.forEach((element) => {
                    var service_input = document.querySelector(
                        "." + element + "_input"
                    );
                    service_input.setAttribute(
                        "data-price",
                        parseFloat(data.additional_services[element]).toFixed(2)
                    );
                    service_input.value = parseFloat(
                        data.additional_services[element]
                    ).toFixed(2);

                    var service_span = document.querySelector(
                        "." + element + "_span"
                    );
                    service_span.innerHTML =
                        parseFloat(data.additional_services[element]).toFixed(
                            2
                        ) + " €";
                });

                Swal.fire({
                    position: "center",
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
            position: "center",
            icon: "error",
            title: "Please enter country information and cargo details to calculate Cargo Company price",
            showConfirmButton: false,
            backdrop: true,
            timer: 3000,
        });
    }

    if (from_where == "next") {
        setTimeout(() => {
            button = document.querySelector(".next-button-with-quote");
            nextTo("shipment_def", button);
        }, 2000);
    }
}

// Check inputs with Next TO
function nextTo(section_name, button) {
    var form_li = button.parentNode.previousElementSibling;
    inputs = form_li.querySelectorAll(".check-input");
    var result = 1;
    var required = [];
    var section = document.querySelector("#" + section_name);

    if (section.querySelector(".amazonHeaderText") == null) {
        section_text = "";
    } else {
        var section_text = section.querySelector(".amazonHeaderText").innerHTML;
    }

    var modal_message = "Please fill inputs in next field: ";
    var required_message = "Please check everything again";

    inputs.forEach((input) => {
        if (!input.value || input.value == "") {
            var input_name = input.getAttribute("name");
            input_name = input_name.replace("_", " ");
            input_name =
                " " +
                input_name.charAt(0).toUpperCase() +
                input_name.slice(1) +
                " ";
            required.push(input_name);
        }
    });

    if (section_name == "shipment_def") {
        required_message =
            "Not all total values calculated. Please fill all fields to calculate";
        var totalAmount = parseFloat(
            document.querySelector(".totalAmount").innerHTML
        ).toFixed(2);
        var totalWeight = parseFloat(
            document.querySelector(".totalWeight").innerHTML
        ).toFixed(2);
        var totalVolume = parseFloat(
            document.querySelector(".totalVolume").innerHTML
        );
        var totalDeci = parseFloat(
            document.querySelector(".totalPricing").innerHTML
        );
        var totalWorth = parseFloat(
            document.querySelector(".totalWorth").innerHTML
        ).toFixed(2);

        if (
            totalAmount > 0 &&
            totalWeight > 0 &&
            totalVolume > 0 &&
            totalDeci > 0 &&
            totalWorth > 0
        ) {
            result = 1;
        } else {
            result = 0;
        }
    }
    if (section_name == "product_content") {
        var company = document.querySelector(
            'input[name="cargo_company"]:checked'
        );
        if (company == null) {
            result = 0;
            required_message = "Please select any cargo company";
        }
    }
    if (section_name == "submit_button_form") {
        var file_input_check = document.querySelector("#CustomFileUpload");
        console.log(file_input_check.value);
        if (!file_input_check.value) {
            result = 0;
            required_message = "Please upload needed documents";
        } else {
            modal_message = "Everything is ready to submit. You can submit now";
        }
    }

    // check all inputs
    if (result == 1) {
        if (required.length > 0) {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "All fields are required. Please fill theese fields: ",
                html:
                    `
                        <h3 style="color:#f27474;">
                        ` +
                    required +
                    `
                        </h3>
                    `,
                backdrop: true,
                showConfirmButton: true,
            });
        } else {
            Swal.fire({
                position: "center",
                icon: "success",
                html:
                    `
                        <h3 style="color:rgb(66 164 11);">
                        ` +
                    modal_message +
                    section_text +
                    `
                        </h3>
                    `,
                backdrop: true,
                showConfirmButton: false,
                timerProgressBar: true,
                timer: 3000,
            });
            section.classList.add("active-order-form-div");
            button.style.display = "none";
            if (section_name == "shipment_def") {
                document.querySelector(".next-button-get-quote").style.display =
                    "block";
            }
        }
    } else {
        Swal.fire({
            position: "center",
            icon: "error",
            html:
                `
                    <h3 style="color:#f27474;">` +
                required_message +
                `</h3>
                `,
            backdrop: true,
            showConfirmButton: true,
        });
    }
}

function changePersonalCargo(personal_name){
    document.querySelector('#selected_personal').value = personal_name;
}
