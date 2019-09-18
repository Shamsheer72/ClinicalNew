{{-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
          <script>
          new WOW().init();
          </script>
<!-- <script type="text/javascript">
  $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })
</script> -->
<script type="text/javascript">
if($(window).width() < 767){
  $('.login-main-fture .owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:3
          }
      }
  });

$(document).ready(function(){
  $("footer h4").click(function(){
    $("footer ul").slideToggle();
  });
});
}


$('.owl-carousel.case-study').owlCarousel({
          loop:true,
          margin:15,
          nav:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:3
              }
          }
})

</script>

<section class="login-copyright">
        <div class="container">
          <p>2019 Copyrights © <a href="#">Clinical Match</a></p>
        </div>
</section>
