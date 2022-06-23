setTimeout(() => {
    console.clear();
}, 1000);

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
    var package = document.querySelector(".package-cont-" + package_id);
    var product_weightS = package.querySelectorAll(".product-weight");
    var product_countS = package.querySelectorAll(".product-count");
    var total = 0;
    for (i = 0; i < product_weightS.length; i++) {
        if (
            parseInt(product_weightS[i].value) > 0 &&
            parseInt(product_countS[i].value) > 0
        ) {
            total +=
                parseInt(product_weightS[i].value) *
                parseInt(product_countS[i].value);
        }
    }

    if (isNaN(total)) {
        weights_array[package_id] = 0;
    } else {
        if (package_weight > 0 && package_count > 0) {
            weights_array[package_id] =
                (total + package_weight) * package_count;
        } else {
            package_weight = 0;
            package_count = 1;
            weights_array[package_id] =
                (total + package_weight) * package_count;
        }
    }
    SumWeights(Object.values(weights_array));
    CalculateDeci(package_id);
}
function SumWeights(array) {
    array.forEach((element) => {
        total_weight += element;
    });
    document.querySelector(".totalWeight").innerHTML = total_weight;
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
    document.querySelector(".totalVolume").innerHTML = total_volume;
    total_volume = 0;
}

//--------------------------- CALCULATING TOTAL VOLUME edns here--------------------------->

//--------------------------- CALCULATING TOTAL DECI starts here--------------------------->
function CalculateDeci(package_id) {
    if (volumes_array[package_id] > 0 && weights_array[package_id] > 0) {
        decis_array[package_id] = Math.max(
            volumes_array[package_id] / 5000,
            weights_array[package_id]
        );
    }else if(weights_array[package_id] == 0){
        decis_array[package_id] = volumes_array[package_id] / 5000;
    }else{
        decis_array[package_id] = 0;
    }

    SumDecis(Object.values(decis_array));
}
function SumDecis(array) {
    array.forEach((element) => {
        total_deci += element;
    });
    document.querySelector(".totalPricing").innerHTML = total_deci;
    total_deci = 0;
}
//--------------------------- CALCULATING TOTAL DECI edns here--------------------------->

// var deci = Math.max(package_volume / 5000, package_total_weight);
