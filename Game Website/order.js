const order = document.getElementById('order-form');

order.addEventListener('submit', (event) => {
  event.preventDefault();
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;
  const game = document.getElementById('game').value;
  const mailtoLink = 'mailto:bi23ti@student.sunderland.ac.uk' +
    `?subject=${encodeURIComponent('New order form submission from ' + name)}` +
    `&body=${encodeURIComponent('\n\nGame: ' + game + '\n\nAdditional Message: ' + message + '\n\nFrom: ' + name + ' (' + email + ')')}`;
  window.location.href = mailtoLink;
  order.reset();
});

function gotoentrance() {
  window.open("index.html", "_blank");
}

function gotohomepage() {
  window.open("homepage.php", "_blank");
}

function gotoabout() {
  window.open("about.php", "_blank");
}

function gotocontact() {
  window.open("contact.php", "_blank");
}

function gotolinks() {
  window.open("links.php", "_blank");
}

function gotoproducts() {
  window.open("products.php", "_blank");
}

function gotosearch() {
  window.open("search.php", "_blank");
}

function gotoorder() {
  window.open("order.php", "_blank");
}

function gotologin() {
  window.open("login.php", "_blank");
}
function gotoregister() {
  window.open("register.php", "_blank");
}
function gotologout() {
  window.open("logout.php", "_blank");
}
