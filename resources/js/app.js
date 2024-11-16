// Slider
window.onload = () => {
  const sliders = document.querySelectorAll('.glide');

  sliders.forEach((slider) => {
    new Glide(slider, {
      type: 'carousel',
      perView: 8,
      gap: 10,
      breakpoints: {
        1200: {
          perView: 3
        },
        800: {
          perView: 2
        }
      }
    }).mount();
  })
}

// Cart
const cartNumberElement = document.getElementById('cart-number');
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Get cart
fetch('/get-cart')
  .then((response) => response.json())
  .then((data) => {
    console.log(data);
    if (data.length > 0) {
      cartNumberElement.textContent = data.length;
    }
  })

const addToCartBtns = document.querySelectorAll('[data-book-id]');

addToCartBtns.forEach((addToCartBtn) => {
  const bookId = addToCartBtn.dataset.bookId;

  addToCartBtn.addEventListener('click', async function () {
    this.disabled = "true";
    this.textContent = "ADDED";

    cartNumberElement.textContent++;

    fetch('/add-to-cart', {
      method: 'POST',
      headers: {
        'Content-Type': 'Application/json',
        'X-CSRF-TOKEN': csrfToken
      },
      body: JSON.stringify({ bookId: bookId })
    })
      .catch((error) => {
        console.log(error);
      })
  })
})