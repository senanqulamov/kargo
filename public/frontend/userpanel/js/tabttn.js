let balanceBoxs = document.querySelectorAll(".balance__box");
let balanceText = document.querySelectorAll(".balance__box p");
let balanceDownload1 = document.querySelector("#balance__download-btn-1");
let balanceDownload2 = document.querySelector("#balance__download-btn-2");
let balanceDownload3 = document.querySelector("#balance__download-btn-3");

var executed = false;


balanceBoxs[0].classList.add("btn-back");
balanceText[0].style.color = "#405982";

balanceBoxs[0].addEventListener("click", function () {
    balanceBoxs[0].classList.add("btn-back");
    balanceText[0].style.color = "#405982";
    balanceBoxs[1].classList.remove("btn-back");
    balanceText[1].style.color = "#4878D1";
    balanceBoxs[2].classList.remove("btn-back");
    balanceText[2].style.color = "#4878D1";

    balanceDownload1.style.display = "block";
    balanceDownload2.style.display = "none";
    balanceDownload3.style.display = "none";
});

balanceBoxs[1].addEventListener("click", function () {
    balanceBoxs[1].classList.add("btn-back");
    balanceText[1].style.color = "#405982";
    balanceBoxs[0].classList.remove("btn-back");
    balanceText[0].style.color = "#4878D1";
    balanceBoxs[2].classList.remove("btn-back");
    balanceText[2].style.color = "#4878D1";

    balanceDownload1.style.display = "none";
    balanceDownload2.style.display = "block";
    balanceDownload3.style.display = "none";

    if (executed == false) {
        $("#payment_history")
            .DataTable({
                order: [[0, "desc"]],
                responsive: false,
                lengthChange: false,
                autoWidth: true,
                scrollY: "50vh",
                scrollCollapse: true,
                paging: false,
                scrollX: true,
                dom: "Brftip",
                buttons: [
                    {
                        extend: "excel",
                        text: "Save as Excel",
                        filename: "table_to_excel",
                        extension: ".xlsx",
                    },
                ],
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");

        $("#transaction_history")
            .DataTable({
                order: [[0, 'desc']],
                responsive: false,
                lengthChange: false,
                autoWidth: true,
                scrollY: "50vh",
                scrollCollapse: true,
                paging: false,
                scrollX: true,
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
    }
    executed = true;
});

balanceBoxs[2].addEventListener("click", function () {
    balanceBoxs[2].classList.add("btn-back");
    balanceText[2].style.color = "#405982";
    balanceBoxs[0].classList.remove("btn-back");
    balanceText[0].style.color = "#4878D1";
    balanceBoxs[1].classList.remove("btn-back");
    balanceText[1].style.color = "#4878D1";

    balanceDownload1.style.display = "none";
    balanceDownload2.style.display = "none";
    balanceDownload3.style.display = "block";
});

//
