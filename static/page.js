function navbarclicked() {
  const navitems = document.getElementById("navitems");
  navitems.classList.toggle("hidden");
}

function generate_promptpay() {
  document.getElementById("qrcode").replaceChildren();
  var promptpay_text = PromptPayQR.gen_text("0888888888", prompt_price);
  new QRCode(document.getElementById("qrcode"), promptpay_text);
}

function scan_barcode() {
  var lastResult = "";
  Quagga.init(
    {
      locate: true,
      inputStream: {
        name: "Live",
        type: "LiveStream",
        target: document.querySelector("#barcode_scanner"),
        constraints: {
          width: 640,
          height: 480,
        },
      },
      decoder: {
        readers: ["ean_reader"],
        patchSize: "x-small",
        debug: {
          drawBoundingBox: false,
          showFrequency: false,
          drawScanline: false,
          showPattern: true,
        },
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

  Quagga.onDetected(function (result) {
    var code = result.codeResult.code;

    if (lastResult !== code) {
      lastResult = code;
    } else {
      replace_pcode_field(code);
    }
  });
}

var audio = new Audio("/static/beep.mp3");

async function replace_pcode_field(pcode) {
  document.getElementById("pcode_field").value = pcode;
  document.getElementById("barcode_scanner").style.borderColor = "green";
  audio.play();
}
