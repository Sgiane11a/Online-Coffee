import Splide from '@splidejs/splide';
import '@splidejs/splide/css/core';

var welcomeSlide = new Splide( '#welcome-slide', {
    type   : 'loop',
    autoplay: true,
    perPage: 3,
  } );
  
  welcomeSlide.mount();