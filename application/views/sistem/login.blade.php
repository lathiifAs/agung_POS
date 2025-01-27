<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" href="img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/all.css') }}">
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/nice-select.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/slick.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/price_rangs.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ base_url('assets/client_template/css/style.css') }}">
</head>

<body class="bg-white">
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-11">
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Login Aplikasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding">
        <div class="container">
            <div class="row align-items-center">

                <!-- tampilan website -->
                <div class="col-lg-6 col-md-6  d-none d-lg-block">
                    <img src="{{ base_url('assets/images/background/wp_store.jpg') }}" alt="">
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            {{-- notif --}}
                            @include('template/notif')
                            <h2 style="margin-left:3%; margin-bottom:10%;" class="text-primary" >Aplikasi Point of Sale.</h2>
                            <form action="{{ site_url('sistem/login/login_process') }}" method="post">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" type="username" name="username"
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="submit" class="btn_3">
                                        Masuk
                                    </button>
                                    <!-- tampilan mobile -->
                                    <div class="col-lg-6 col-md-6 d-lg-none d-block">
                                        <a href="{{ site_url('sistem/register') }}"> <button
                                                style="background-color:white;color:grey" type="button" value="beranda"
                                                class="btn_3">
                                                Buat Akun
                                            </button> </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | <a href="https://artdev.com"
                                target="_blank">artdev.com</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </P>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ base_url('assets/client_template/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ base_url('assets/client_template/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ base_url('assets/client_template/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ base_url('assets/client_template/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ base_url('assets/client_template/js/swiper.min.js') }}"></script>
    <!-- swiper js -->

    <!-- particles js -->
    <script src="{{ base_url('assets/client_template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ base_url('assets/client_template/js/slick.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/waypoints.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/contact.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.form.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/jquery.validate.min.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/mail-script.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/stellar.js') }}"></script>
    <script src="{{ base_url('assets/client_template/js/price_rangs.js') }}"></script>
    <!-- custom js -->
    <script src="{{ base_url('assets/client_template/js/custom.js') }}"></script>
</body>

</html>