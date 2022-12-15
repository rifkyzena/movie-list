<script src="{{ asset('assets/jquery-3.6.2/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-5.2.3/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/fontawesome-free-6.2.1/js/all.min.js') }}"></script>
<script src="{{ asset('assets/swiper-8.4.5/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/select2-4.0.13/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/sweetalert2-11.6.15/sweetalert2.all.min.js') }}"></script>
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