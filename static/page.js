function navbarclicked() {
  const navitems = document.getElementById("navitems");
  navitems.classList.toggle("hidden");
  document.getElementById("pcode_field").value = "test1";
}

function generate_promptpay() {
  document.getElementById("qrcode").replaceChildren();
  var promptpay_text = PromptPayQR.gen_text("0888888888", prompt_price);
  new QRCode(document.getElementById("qrcode"), promptpay_text);
}

function scan_barcode() {
  Quagga.init(
    {
      inputStream: {
        name: "Live",
        type: "LiveStream",
        target: document.querySelector("#barcode_scanner"),
      },
      constraints: {
        width: 300,
        height: 300,
      },
      decoder: {
        readers: ["ean_reader"],
        debug: {
          drawBoundingBox: true,
          showFrequency: false,
          drawScanline: true,
          showPattern: true,
        },
        multiple: false,
      },
    },
    function (err) {
      if (err) {
        console.log(err);
        return;
      }
      console.log("Initialization finished. Ready to start");
      Quagga.start();
    }
  );

  Quagga.onDetected(function (data) {
    replace_pcode_field(data.codeResult.code);
    document.querySelector("#viewport").replaceChildren();
    Quagga.stop();
  });
}

function replace_pcode_field(pcode) {
  document.getElementById("pcode_field").value = pcode;
}
