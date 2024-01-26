<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>نظام ادارة التعليم الاكتروني</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    @font-face {
        font-family: 'OptimusPrinceps';
    src: url('{{asset('/fonts/NotoNaskhArabic-VariableFont_wght.ttf')}}');
}
    *{

font-family: 'OptimusPrinceps' !important;

    }
    ul{

        font-family: 'OptimusPrinceps';

            }
</style>
</head>

<body>

 <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>1234576</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">

      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex  align-items-center">

      <div class="logo">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="{{ route('home') }}"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
      <ul>
        <li><a class="active" href="{{ route('home') }}">الصفحة الرئيسية</a></li>
        <li><a href="{{ url('/courses_search') }}"> البحث عن بطاقة دورة</a></li>
        <li><a href="{{ url('materials_search') }}">البحث عن بطافة مقرر</a></li>
                <li><a href="{{ url('course-training-plan') }}"> النشرة</a></li>

        <li><a href="{{ url('evaluation') }}"> التقييم</a></li>

        <li><a href="{{ url('evaluation/attendance') }}"> الحضور</a></li>
        <li><a href="{{ url('admin') }}"> ادارة النظام</a></li>



      </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"> نظام  <span>البطاقات</span></h2>
                <p class="animate__animated animate__fadeInUp">هو نظام تم تحليله وبرمجته في قسم المناهج التعليم الإلكتروني بإدارة تدريب قوات الدفاع الجوي ليساعد جميع المعلمين و الطلاب
                للوصول إلى البطاقة الخاصة بمنهج الدورة أو المقرر بشكل سريع وسهل مع إمكانية حفظها كملف PDF أو طباعتها مباشرة..</p>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.png)">
            <div class="carousel-container">
              <!-- <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"> نظام <span>البطاقات</span></h2>
                <p class="animate__animated animate__fadeInUp">هو نظام تم تحليله وبرمجته في قسم المناهج التعليم الإلكتروني بإدارة
                  تدريب قوات الدفاع الجوي ليساعد جميع المعلمين و الطلاب
                  للوصول إلى البطاقة الخاصة بمنهج الدورة أو المقرر بشكل سريع وسهل مع إمكانية حفظها كملف PDF أو طباعتها مباشرة..</p>
              </div> -->
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown"> نظام <span>البطاقات</span></h2>
                <p class="animate__animated animate__fadeInUp">هو نظام تم تحليله وبرمجته في قسم المناهج التعليم الإلكتروني بإدارة
                  تدريب قوات الدفاع الجوي ليساعد جميع المعلمين و الطلاب
                  للوصول إلى البطاقة الخاصة بمنهج الدورة أو المقرر بشكل سريع وسهل مع إمكانية حفظها كملف PDF أو طباعتها مباشرة..</p>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h3><a href=""> في أي وقت
</a></h3>
              <p>توفر بطاقات المقررات والمناهج على شبكة الدفاع الجوي بشكل دائم.
</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h3><a href="">البحث </a></h3>
              <p>البحث على بطاقة الدورة أو المقرر وإظهار النتائج بكل سهولة.
</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h3><a href="">الطباعة
</a></h3>
              <p>إمكانية طباعة البطاقات بالشكل الرسمي المعتمد ويمكن حفظها كملف PDF
</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Section -->

    <!-- ======= About Section ======= -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
<div class="section-title">
  <h2>مميزات نظام البطاقات</h2>
</div>
        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4>سهولة الوصول للمحتوى (إمكانية الوصول للمواد الدراسية)
</h4>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href=""> تتمركز حول الإدارة والإنشاء والتعديل في بيئة تعلم الكترونية </a></h4>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">تسمح بتسليم وطباعة التقارير والشهادات وعرض نتائج الاختبارات وكل العمليات الدراسية.
 </a></h4>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4> اختصار وتوفير الوقت والجهد السرعة في التنفيذ
</h4>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>

                            <h4><a href="">تركز على إنشاء وتخزين المحتوى التعليمي
  </a></h4>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">نظم إدارة التعلم LMS تقدم لك فرص التعليم الجيد في أي مكان واي وقت </a></h4>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>الوحدات</h2>
        </div>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">



    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>الروبط</h4>
            <ul>
            <li> <i class="bx bx-chevron-right"></i> <a class="active" href="">الصفحة الرئيسية</a></li>
            <li> <i class="bx bx-chevron-right"></i> <a href="{{ url('/courses_search') }}"> البحث عن بطاقة دورة</a></li>
            <li> <i class="bx bx-chevron-right"></i> <a href="{{ url('materials_search') }}">البحث عن بطافة مقرر</a></li>
            <li> <i class="bx bx-chevron-right"></i> <a href="{{ url('evaluation') }}"> التقييم</a></li>
            <li> <i class="bx bx-chevron-right"></i> <a href="{{ url('admin') }}"> ادارة النظام</a></li>
            <li> <i class="bx bx-chevron-right"></i><a href="#">اتصل بنا</a></li>
            </ul>
          </div>


          <div class="col-lg-4 col-md-6 footer-contact">
            <h4> اتصل بنا </h4>
            <p>

              ادارة التعليم الاكتروني
                <br><br>
              <strong>الهاتف:</strong> +1111111111<br>
              <strong>البريد الاكتروني:</strong> info@info.com<br>
            </p>

          </div>

          <div class="col-lg-4 col-md-6 footer-info">
            <h3> نظام البطاقات</h3>
            <p>هو نظام تم تحليله وبرمجته في قسم المناهج التعليم الإلكتروني بإدارة تدريب قوات الدفاع الجوي ليساعد جميع المعلمين و الطلاب
            للوصول إلى البطاقة الخاصة بمنهج الدورة أو المقرر بشكل سريع وسهل مع إمكانية حفظها كملف PDF أو طباعتها مباشرة..
.</p>
            <div class="social-links mt-3">

            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; جميع الحقوق محفوظة <strong><span>شركة الانظمة المتقدمة</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/ -->
        <!-- <a href="https://bootstrapmade.com/">شركة الانظمة المتقدمة</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
