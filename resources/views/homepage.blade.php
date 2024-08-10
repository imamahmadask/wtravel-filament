@extends('layouts.guest')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container">
            <div>
                <!--========== ISLANDS 1 ==========-->
                <section class="islands">
                    <img src="https://images.unsplash.com/photo-1562260466-6a54274f610b?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="" class="islands__bg" />
                    <div class="bg__overlay">
                        <div class="islands__container container">
                            <div class="islands__data" style="z-index: 99; position: relative">
                                <h2 class="islands__subtitle">
                                    <img src="images/favicon.png" alt="">
                                </h2>
                                <h1 class="islands__title">
                                    West Travel Indonesia
                                </h1>
                                <p class="islands__subtitle">
                                    Wander Without Worry
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!--==================== POPULAR ====================-->
    <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">Best Choice</span>
            <h2 class="section__title" style="text-align: center">
                Tour Packages
            </h2>

            <div class="popular__container swiper">
                <div class="swiper-wrapper">
                    @foreach ($travel_packages as $travel_package)
                        <article class="popular__card swiper-slide">
                            <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                                <img src="{{ Storage::url($travel_package->images[0]) }}" alt=""
                                    class="popular__img" />
                                <div class="popular__data">
                                    <small> <i class='bx bxs-flag-alt'></i> {{ $travel_package->country }}</small> <br>
                                    Start From
                                    <h2 class="popular__price">
                                        {{ number_format($travel_package->price) }} <span>IDR</span>
                                    </h2>
                                    <h3 class="popular__title">{{ $travel_package->title }}</h3>
                                    <p class="popular__description">{{ $travel_package->type }}</p>
                                </div>
                            </a>
                        </article>
                    @endforeach
                </div>

                <div class="swiper-button-next">
                    <i class="bx bx-chevron-right"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="bx bx-chevron-left"></i>
                </div>
            </div>
        </div>
    </section>

    <!--==================== VALUE ====================-->
    <section class="value section" id="value">
        <div class="value__container container grid">
            <div class="value__images">
                <div class="value__orbe"></div>

                <div class="value__img">
                    <img src="{{ asset('assets/img/team.jpg') }}" alt="" />
                </div>
            </div>

            <div class="value__content">
                <div class="value__data">
                    <span class="section__subtitle">Why Choose Us</span>
                    <h2 class="section__title">
                        Experience That We Promise To You
                    </h2>
                    <p class="value__description">
                        Join West Travel and embark on your next adventure with confidence. With us, you can truly wander
                        without worry.
                    </p>
                </div>

                <div class="value__accordion">
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-hand value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Expert Guidance
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>
                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                Our experienced travel consultants are here to guide you every step of the way.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-plane-alt value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Comprehensive Services
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>
                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                From planning to execution, we handle all aspects of your travel.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-happy-alt value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Customer Satisfaction
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>
                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                Your satisfaction is our top priority. We strive to provide the best travel experiences.
                            </p>
                        </div>
                    </div>
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bx-money value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                Competitive Pricing
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>
                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                Enjoy great value with our competitive rates and exclusive deals.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- blog -->
    <section class="blog section" id="blog">
        <div class="blog__container container">
            <span class="section__subtitle" style="text-align: center">Our Blog</span>
            <h2 class="section__title" style="text-align: center">
                The Best Trip For You
            </h2>

            <div class="blog__content grid">
                @foreach ($blogs as $blog)
                    <article class="blog__card">
                        <div class="blog__image">
                            <img src="{{ Storage::url($blog->image) }}" alt="" class="blog__img" />
                            <a href="{{ route('blog.show', $blog->slug) }}" class="blog__button">
                                <i class="bx bx-right-arrow-alt"></i>
                            </a>
                        </div>

                        <div class="blog__data">
                            <h2 class="blog__title">
                                {{ $blog->title }}
                            </h2>
                            <p class="blog__description">
                                {{ $blog->excerpt }}
                            </p>

                            <div class="blog__footer">
                                <div class="blog__reaction">
                                    {{ date('d M Y', strtotime($blog->created_at)) }}
                                </div>
                                <div class="blog__reaction">
                                    <i class="bx bx-show"></i>
                                    <span>{{ $blog->reads }}</span>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
