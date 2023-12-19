function navbarclicked() {
  const navitems = document.getElementById("navitems");
  navitems.classList.toggle("hidden");
}

var qr_code;

function generate_promptpay() {
  document.getElementById("qrcode").replaceChildren();
  var promptpay_text = PromptPayQR.gen_text("0888888888", prompt_price);
  new QRCode(document.getElementById("qrcode"), promptpay_text);
}
