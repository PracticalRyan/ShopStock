function navbarclicked() {
  const navitems = document.getElementById("navitems");
  navitems.classList.toggle("hidden");
}

function generate_promptpay() {
  var promptpay_text = PromptPayQR.gen_text("8888888888", 235);
  new QRCode(document.getElementById("qrcode"), promptpay_text);
}
