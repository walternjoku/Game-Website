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


  // Get the product container element
const productContainer = document.getElementById('product-container');

// Make a request to the server to get the products from the database
fetch('products.php')
  .then(response => response.json())
  .then(products => {
    // Loop through the products and add them to the page
    products.forEach(product => {
      // Create a div element for the product
      const productDiv = document.createElement('div');
      productDiv.classList.add('product');

      // Create an image element for the product
      const img = document.createElement('img');
      img.src = product.image;
      img.alt = product.name;
      productDiv.appendChild(img);

      // Create a heading element for the product name
      const name = document.createElement('h2');
      name.textContent = product.name;
      productDiv.appendChild(name);

      // Create a paragraph element for the product description
      const description = document.createElement('p');
      description.textContent = product.description;
      productDiv.appendChild(description);

      // Create a button element for the product price
      const price = document.createElement('button');
      price.textContent = `$${product.price}`;
      productDiv.appendChild(price);

      // Add the product div to the container
      productContainer.appendChild(productDiv);
    });
  })
  .catch(error => {
    console.error(error);
  });
