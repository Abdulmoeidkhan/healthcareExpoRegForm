// require("jspdf");
// import { jsPDF } from "jspdf";

// BarCode Generator

$("#barCode").barcode(
    $("#barCode").attr("custom-id"),
    "code128",
    {
        showHRI: true,
        barWidth: 3,
    }
);



let qr_code_element = document.querySelector(".qr-code");

function generate() {
    qr_code_element.style = "";
    var qrcode = new QRCode(qr_code_element, {
        text: `${$("#barCode").attr("custom-id")}`,
        width: 128, //128
        height: 128,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });
}

generate($($("#qrCode")))


function downloadBadge() {
    if (window.innerWidth < 1000) {
        document.getElementsByName("viewport")[0].content = "width=1024, initial-scale=1.0";

        html2canvas(document.getElementsByClassName("container")[0]).then(function (canvas) {
            window.jsPDF = window.jspdf.jsPDF;
            var imgData = canvas.toDataURL('image/png');
            var doc = new window.jsPDF({
                orientation: "potrait",
                unit: 'px',
            });
            doc.addImage(imgData, 'png', 1, 1, 440, 480)
            doc.save($("#barCode").attr("custom-id") + ' e-Badge.pdf');
        });
        document.getElementsByName("viewport")[0].content = "width=device-width, initial-scale=1.0";
    }
    else {

        html2canvas(document.getElementsByClassName("container")[0]).then(function (canvas) {
            window.jsPDF = window.jspdf.jsPDF;
            var imgData = canvas.toDataURL('image/png');
            var doc = new window.jsPDF({
                orientation: "potrait",
                unit: 'px',
            });
            doc.addImage(imgData, 'png', 1, 1, 440, 480)
            doc.save($("#barCode").attr("custom-id") + ' e-Badge.pdf');
        });
        document.getElementsByName("viewport")[0].content = "width=device-width, initial-scale=1.0";/*  */
    }
    // window.jsPDF = window.jspdf.jsPDF;
    // var doc = new window.jsPDF({
    //     orientation: "potrait",
    // });
    // var elementHTML = document.querySelector(".container");
    // // console.log(elementHTML)
    // doc.html(elementHTML, {
    //     callback: function (doc) {
    //         // Save the PDF
    //         doc.save($("#barCode").attr("custom-id") + ' e-Badge.pdf');
    //     },
    //     x: 1,
    //     y: 1,
    //     width: 210, //target width in the PDF document
    //     windowWidth: 1200 //window width in CSS pixels
    // });

}
// window.onload = function () {
//     window.print();
// }