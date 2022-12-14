{{-- <script src="{{ mix('js/app.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  new Swiper('.swiper', {
      // Optional parameters
      direction: 'horizontal',
      loop: false,
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.swiper-pagination',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        // when window width is >= 640px
        440: {
          slidesPerView: 2,
          spaceBetween: 40
        },
        740: {
          slidesPerView: 3,
          spaceBetween: 80
        },
        900: {
          slidesPerView: 5,
          spaceBetween: 40
        }
      }
    });
</script>