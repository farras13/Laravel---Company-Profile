<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>GAS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/front/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/front/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: eNno
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">GAS</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="/front/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#testimoni">Testimoni</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>{{ $dashboard->title == '' ? 'Elegant and creative solutions' : $dashboard->title }}</h1>
                    <h2>{{ $dashboard->desc == '' ? 'We are team of talented designers making websites with Bootstrap' : $dashboard->desc }}
                    </h2>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    @if ($dashboard->images != null)
                        <img src="{{ asset('/pages') . '/' . $dashboard->images }}" class="img-fluid animated"
                            alt="">
                    @else
                        <img src="{{ asset('/front/img/hero-img.png') }}" class="img-fluid animated" alt="">
                    @endif
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row">
                    @foreach ($fitur as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="icon-box">
                                <div class="icon"><img src="{{ asset('/fitur') . '/' . $item->images }}"
                                        class="img-fluid animated" alt=""></div>
                                <h4 class="title"><a href="">{{ $item->title }}</a></h4>
                                <p class="description">{{ $item->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        @if ($about->images != null)
                            <img src="{{ asset('/pages') . '/' . $about->images }}" class="img-fluid animated"
                                alt="">
                        @else
                            <img src="{{ asset('/front/img/about.png') }}" class="img-fluid" alt="">
                        @endif
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>{{ $about->title ? $about->title : 'About Company' }}</h3>
                        <p>
                            {{ $about->desc ? $about->desc : 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.' }}
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title">
                    <span>Services</span>
                    <h2>{{ !empty($service->title) ? $service->title : 'Service' }}</h2>
                    <p>{{ !empty($service->desc) ? $service->desc : 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias ' }}
                    </p>
                </div>

                <div class="row">
                    @if (!empty($services))
                        @foreach ($services as $s)
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                <div class="icon-box">
                                    <div class="icon">
                                        @if ($s->images != null)
                                            <img src="{{ asset('/service') . '/' . $s->images }}"
                                                class="img-fluid animated" alt="">
                                        @else
                                            <img src="{{ asset('/front/img/about.png') }}" class="img-fluid"
                                                alt="">
                                        @endif
                                    </div>
                                    <h4><a href="">{{ $s->title }}</a></h4>
                                    <p>{{ $s->desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                <h4><a href="">Lorem Ipsum</a></h4>
                                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4><a href="">Sed ut perspiciatis</a></h4>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-tachometer"></i></div>
                                <h4><a href="">Magni Dolores</a></h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-world"></i></div>
                                <h4><a href="">Nemo Enim</a></h4>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-slideshow"></i></div>
                                <h4><a href="">Dele cardo</a></h4>
                                <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-arch"></i></div>
                                <h4><a href="">Divera don</a></h4>
                                <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <span>{{ !empty($portofolio->title) ? $portofolio->title : 'PORTFOLIO' }}</span>
                    <h2>{{ !empty($portofolio->title) ? $portofolio->title : 'PORTFOLIO' }}</h2>
                    <p>{{ !empty($portofolio->desc) ? $portofolio->desc : 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias' }}</p>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($tagsporto as $item)
                                <li data-filter=".filter-{{ $item->tags }}">{{ $item->tags }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">
                    @foreach ($porto as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->tags }}">
                            <img src="{{ asset('portofolio') . '/' . $item->images }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $item->title }}</h4>
                                <p>{{ $item->desc }}</p>
                                <a href="{{ asset('portofolio') . '/' . $item->images }}"
                                    data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                    title="{{ $item->title }}"><i class="bx bx-plus"></i></a>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimoni" class="testimonials section-bg">
            <div class="container">

                <div class="section-title">
                    <span>{{ !empty($tesmon->title) ? $tesmon->title : 'Testimoni' }}</span>
                    <h2>{{ !empty($tesmon->title) ? $tesmon->title : 'Testimoni' }}</h2>
                    <p>{{ !empty($tesmon->desc) ? $tesmon->desc : 'Sit sint consectetur velit quisquam cupiditate impedit suscipit alias' }}</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($testimoni as $test)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{ $test->desc }}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                    <img src="/front/img/testimonials/testimonials-1.jpg" class="testimonial-img"
                                        alt="">
                                    <h3>{{ $test->name }}</h3>
                                    <h4>{{ $test->jobs }}</h4>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">


        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Me</span></strong>. All Rights Reserved
            </div>
            <div class="credits">

                Designed by Me
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/front/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/front/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/front/js/main.js') }}"></script>

</body>

</html>
