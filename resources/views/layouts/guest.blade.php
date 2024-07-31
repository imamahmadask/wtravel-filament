<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" type="image/x-icon" href="/images/favicon.png">

    <!--=============== BOXICONS ===============-->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/libraries/swiper-bundle.min.css') }}" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    @stack('style-alt')
    <title>West Travel Indonesia</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="{{ route('homepage') }}" class="nav__logo">
                <img src="/images/logo.png" alt="West Travel Indonesia Logo" class="logo-image">
            </a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('homepage') }}"
                            class="nav__link {{ request()->is('/') ? ' active-link' : '' }}">
                            <i class="bx bx-home-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('travel_package.index') }}"
                            class="nav__link {{ request()->is('package/travel-packages') || request()->is('package/travel-packages/*') ? ' active-link' : '' }}">
                            <i class="bx bx-building-house"></i>
                            <span>Packages</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('blog.index') }}"
                            class="nav__link {{ request()->is('blogs') || request()->is('blogs/*') ? ' active-link' : '' }}">
                            <i class="bx bx-award"></i>
                            <span>Blog</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('about') }}"
                            class="nav__link {{ request()->is('about') ? ' active-link' : '' }}">
                            <i class="bx bx-user"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="{{ route('contact') }}"
                            class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}">
                            <i class="bx bx-phone"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- theme -->
            <i class="bx bx-moon change-theme" id="theme-button"></i>

            <a target="_blank"
                href="https://api.whatsapp.com/send?phone=6285253219288&text=Hello West Travel Indonesia! I want to book ..."
                class="button nav__button">
                Booking Now
            </a>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        @yield('content')
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div>
                <a href="{{ route('homepage') }}" class="footer__logo">
                    <img src="/images/logo2.png" width="300px" alt="">
                </a>
                <p class="footer__description">

                </p>
            </div>

            <div class="footer__content">
                <div>
                    <h3 class="footer__title">About</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="/about" class="footer__link">About Us</a>
                        </li>

                        <li>
                            <a href="/blogs" class="footer__link">News & Blog</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Support</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">FAQs </a>
                        </li>
                        <li>
                            <a href="/contact" class="footer__link"> Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer__title">Follow us</h3>

                    <ul class="footer__social">
                        <a href="#" class="footer__social-link">
                            <i class="bx bxl-facebook-circle"></i>
                        </a>
                        <a href="https://instagram.com/westtravel.id" class="footer__social-link" target="_blank">
                            <i class="bx bxl-instagram-alt"></i>
                        </a>
                        <a href="https://www.tiktok.com/@westtravel.id" class="footer__social-link" target="_blank">
                            <i class="bx bxl-tiktok"></i>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer__info container">
            <span class="footer__copy">
                &#169; westtravel.id All rigths reserved
            </span>
            <div class="footer__privacy">
                <a href="#">Terms & Agreements</a>
                <a href="#">Privacy Policy</a>
            </div>
        </div>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="bx bx-chevrons-up"></i>
    </a>

    <!--=============== SCROLLREVEAL ===============-->
    <script src="{{ asset('assets/libraries/scrollreveal.min.js') }}"></script>

    <!--=============== SWIPER JS ===============-->
    <script src="{{ asset('assets/libraries/swiper-bundle.min.js') }}"></script>

    <!--=============== MAIN JS ===============-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('script-alt')
</body>

</html>
