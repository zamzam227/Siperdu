
<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Sistem Perpustakaan Terpadu">
    <meta name="keywords" content="perpustakaan, buku, katalog, peminjaman, siperdu">

    <!-- Site Title -->
    <title>@yield('title', 'Sistem Perpustakaan Terpadu')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assetsUser/bootstrap/css/bootstrap.min.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assetsUser/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsUser/fonts/themify-icons.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assetsUser/owlcarousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsUser/owlcarousel/css/owl.theme.css') }}">

    <!-- Mobile Menu -->
    <link rel="stylesheet" href="{{ asset('assetsUser/css/jquery-simple-mobilemenu.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assetsUser/css/magnific-popup.css') }}">

    <!-- Animation -->
    <link rel="stylesheet" href="{{ asset('assetsUser/css/animate.css') }}">

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('assetsUser/css/style.css') }}">

    @stack('styles')
</head>

<body data-spy="scroll" data-offset="80">

    <!-- START PRELOADER -->
    <div class="preloaders">
        <span class="loader"></span>
    </div>
    <!-- END PRELOADER -->


    <!-- START NAVBAR -->
    <div id="navigation" class="navbar-light bg-faded site-navigation">

        <div class="container-fluid">

            <div class="row align-items-center">

                <!-- LOGO -->
                <div class="col-20 align-self-center">
                    <div class="site-logo">
                        <a href="{{ route('user.beranda') }}">
                            <img src="{{ asset('assetsUser/img/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                </div>

                <!-- DESKTOP NAVIGATION -->
                <div class="col-60 d-flex text-center align-self-center justify-content-center">

                    <nav id="main-menu">
                        <ul>
                            <li>
                                <a href="{{ route('user.beranda') }}">Home</a>
                            </li>

                            <li>
                                <a href="{{ route('user.katalog-buku') }}">Katalog Buku</a>
                            </li>
                        </ul>
                    </nav>

                </div>

                <!-- AUTHENTICATION BUTTON -->
                <div class="col-20 d-none d-xl-block text-end align-self-center">

                    {{-- Jika belum login --}}
                    @guest

                        <a href="{{ route('login') }}" class="header-btn">
                            Sign In
                        </a>

                        <a href="{{ route('register') }}" class="btn_one">
                            Sign Up
                        </a>

                    @endguest


                    {{-- Jika sudah login --}}
                    @auth

                        {{-- Jika Admin --}}
                        @if (Auth::user()->isAdmin())

                            <a href="{{ route('admin.dashboard') }}" class="header-btn">
                                <i class="fa-solid fa-gauge"></i> Admin
                            </a>

                        @else

                            {{-- Jika User Biasa --}}
                            <span class="header-btn">
                                Halo, {{ Str::before(Auth::user()->name, ' ') }}
                            </span>

                        @endif


                        {{-- Tombol Logout --}}
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf

                            <button type="submit" class="btn_one" style="border: none; cursor: pointer;">
                                Logout
                            </button>

                        </form>

                    @endauth

                </div>

            </div>


            <!-- MOBILE NAVIGATION -->
            <ul class="mobile_menu">

                <li>
                    <a href="{{ route('user.beranda') }}">Home</a>
                </li>

                <li>
                    <a href="{{ route('user.katalog-buku') }}">Katalog Buku</a>
                </li>

                @guest

                    <li>
                        <a href="{{ route('login') }}">Sign In</a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}">Sign Up</a>
                    </li>

                @endguest

                @auth

                    @if (Auth::user()->isAdmin())

                        <li>
                            <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        </li>

                    @endif

                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                            Logout
                        </a>
                    </li>

                @endauth

            </ul>

            {{-- Form logout khusus mobile --}}
            @auth
                <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endauth

        </div>

    </div>
    <!-- END NAVBAR -->


    <!-- START MAIN CONTENT -->
    <main>

        @yield('content')

    </main>
    <!-- END MAIN CONTENT -->


    <!-- START FOOTER -->
    <div class="footer section-padding">

        <div class="container">

            <div class="row">

                <!-- ABOUT -->
                <div class="col-lg-3 col-sm-6 col-xs-12">

                    <div class="single_footer">

                        <a href="{{ route('user.beranda') }}">
                            <img src="{{ asset('assetsUser/img/logo.png') }}" alt="Logo">
                        </a>

                        <p>
                            Sistem Perpustakaan Terpadu untuk memudahkan pencarian
                            dan peminjaman koleksi buku.
                        </p>

                        <div class="social_profile">

                            <ul>
                                <li>
                                    <a class="f_facebook" href="#">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a class="f_twitter" href="#">
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a class="f_instagram" href="#">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>

                                <li>
                                    <a class="f_linkedin" href="#">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>


                <!-- NAVIGATION -->
                <div class="col-lg-2 col-sm-6 col-xs-12">

                    <div class="single_footer">

                        <h4>Navigasi</h4>

                        <ul>
                            <li>
                                <a href="{{ route('user.beranda') }}">Home</a>
                            </li>

                            <li>
                                <a href="{{ route('user.katalog-buku') }}">Katalog Buku</a>
                            </li>

                            @auth
                                @if (Auth::user()->isAdmin())
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                                    </li>
                                @endif
                            @endauth

                        </ul>

                    </div>

                </div>


                <!-- BOOK CATEGORY -->
                <div class="col-lg-2 col-sm-6 col-xs-12">

                    <div class="single_footer">

                        <h4>Kategori Buku</h4>

                        <ul>
                            <li><a href="#">Fiksi & Novel</a></li>
                            <li><a href="#">Sains & Teknologi</a></li>
                            <li><a href="#">Sejarah</a></li>
                            <li><a href="#">Pengembangan Diri</a></li>
                        </ul>

                    </div>

                </div>


                <!-- CONTACT -->
                <div class="col-lg-3 col-sm-6 col-xs-12">

                    <div class="single_footer">

                        <h4>Info Kontak</h4>

                        <div class="sf_contact">
                            <span class="ti-map"></span>
                            <p>Jl. Perpustakaan No. 1, Indonesia</p>
                        </div>

                        <div class="sf_contact">
                            <span class="ti-mobile"></span>
                            <p>+62 812 3456 7890</p>
                        </div>

                        <div class="sf_contact">
                            <span class="ti-email"></span>
                            <p>info@perpustakaan.id</p>
                        </div>

                    </div>

                </div>


                <!-- DOWNLOAD APP -->
                <div class="col-lg-2 col-sm-6 col-xs-12">

                    <div class="single_footer">

                        <h4>Download App</h4>

                        <p>
                            Unduh aplikasi perpustakaan di Play Store
                            dan App Store.
                        </p>

                        <a href="#">
                            <img src="{{ asset('assetsUser/img/google-play.jpg') }}"
                                class="foot_img" alt="Google Play">
                        </a>

                        <a href="#">
                            <img src="{{ asset('assetsUser/img/app-store.jpg') }}"
                                class="foot_img" alt="App Store">
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- END FOOTER -->


    <!-- START FOOTER COPYRIGHT -->
    <div class="foot_copy">

        <div class="footer_copyright">

            <p>
                &copy; {{ date('Y') }} Sistem Perpustakaan Terpadu.
                All Rights Reserved.
            </p>

        </div>

    </div>
    <!-- END FOOTER COPYRIGHT -->


    <!-- JAVASCRIPT -->

    <!-- jQuery -->
    <script src="{{ asset('assetsUser/js/jquery-1.12.4.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assetsUser/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Modernizr -->
    <script src="{{ asset('assetsUser/js/modernizr-2.8.3.min.js') }}"></script>

    <!-- Mobile Menu -->
    <script src="{{ asset('assetsUser/js/jquery-simple-mobilemenu.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('assetsUser/owlcarousel/js/owl.carousel.min.js') }}"></script>

    <!-- Magnific Popup -->
    <script src="{{ asset('assetsUser/js/jquery.magnific-popup.min.js') }}"></script>

    <!-- CountTo -->
    <script src="{{ asset('assetsUser/js/jquery.inview.min.js') }}"></script>

    <!-- Scroll Top -->
    <script src="{{ asset('assetsUser/js/scrolltopcontrol.js') }}"></script>

    <!-- WOW Animation -->
    <script src="{{ asset('assetsUser/js/wow.min.js') }}"></script>

    <!-- Main Scripts -->
    <script src="{{ asset('assetsUser/js/scripts.js') }}"></script>

    @stack('scripts')

</body>
</html>
