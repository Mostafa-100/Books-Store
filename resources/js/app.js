window.onload = () => {
  const sliders = document.querySelectorAll('.glide');

  sliders.forEach((slider) => {
    new Glide(slider, {
      type: 'carousel',
      perView: 8,
      focusAt: 'center',
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