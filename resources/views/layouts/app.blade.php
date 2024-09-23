<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Jeungga</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Marcellus:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@600;700;800;900&display=swap" />

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/clients.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/partnership.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/home-preview.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/about-us-preview.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/product-preview.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/technology-preview.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/why-jeungga-preview.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/contact-us.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/newsroom.css') }}" />
  <link rel="shortcut icon" href="{{ asset('assets/file/svgg_4.png')}}" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    @media (max-width: 500px) {

      .contact-us-email {
        margin-bottom: -9px !important;
        margin-left: -62px !important;
        padding: 11px !important;
        width: 137% !important;
      }

      .img-contact {
        margin-left: 17px;
        margin-top: 0px !important;
      }

      .feature-thumbnail-header {
        width: 100% !important;
      }

      .thumbnail-jeungga {
        /* height: 1145px !important; */
      }

      .content-contact-us-left {
        margin-left: -10px !important;
      }

      .heros-detail {
        margin: -49px auto;
      }

      .folders {
        width: 82%;
        margin-top: 33px;
      }

      .bg-grey-home {
        background: linear-gradient(275.14deg, rgb(97 96 96 / 60%) -76.88%, rgba(34, 51, 60, 0.018) 99.15%);
      }

      .title-clickme-text {
        font-size: 34px;
      }

      .section-thing-parent-title {
        & .button-see-product-parent {
          svg {
            width: 18px;
          }
        }
      }

      .content-contact-desc {
        width: 28%;
        font-weight: 100;
        font-size: 8px;
      }

      .content-contact-title {
        font-size: 24px;
        line-height: 24.18px;
      }

      .button-contact-group {
        width: 75%;
      }

      .left-button-contact {
        padding-top: 11px;
        padding-bottom: 10px;
        font-size: 12.51px;
      }

      .right-button-contact {
        font-size: 12.51px;
      }

      .left-button-contact {
        svg {
          transform: scale(2.5);
          width: 5px;
          height: 7px;
        }
      }

      .minml-14 {
        font-size: 12px;
        margin-left: -39px;
      }

      .minml-15 {
        font-size: 12px;
        margin-left: -44px;
      }
    }

    .minml-14 {
        font-size: 12px;
        margin-left: -39px;
      }

      .minml-15 {
        font-size: 12px;
        margin-left: -44px;
      }

      .c-black {
        color: black !important;
      }

      .about-us-top-title-svg {
        svg {
          margin-bottom: 34px;
          transform: scale(7.5);
          width: 5px;
          height: 7px;
        }
      }

      .about-us-top-title {
        font-family: var(--font-raleway) !important;
        font-size:  60px !important;
        font-weight: 700 !important;
        line-height: 70.44px !important;
      }

  </style>
</head>

<body class="index-page scroll-hidden">
  @include('components.header')

  @yield('section-comtainer')

  @include('components.footer')
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Preloader -->

  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <!-- Main JS File -->
  {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  @stack('after-script')
</body>

</html>
