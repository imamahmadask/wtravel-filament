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
    @foreach ($travel_packages->groupBy('group_package') as $group => $packages)
        <section class="section">
            <div class="container">
                <span class="section__subtitle" style="text-align: center">Best Choice</span>
                <h2 class="section__title" style="text-align: center">
                    <a href="{{ route('travel_package.group', $group ?: 'Other') }}" style="color: inherit;">
                        {{ $group ?: 'Tour Packages' }}
                    </a>
                </h2>

                <div class="popular__container swiper">
                    <div class="swiper-wrapper">
                        @foreach ($packages as $travel_package)
                            <article class="popular__card swiper-slide">
                                <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                                    <img src="{{ Storage::url($travel_package->images[0]) }}" alt=""
                                        class="popular__img" />
                                    <div class="popular__data">
                                        <small> <i class='bx bxs-flag-alt'></i>
                                            @if (is_array($travel_package->country) && count($travel_package->country) > 0)
                                                {{ implode(', ', $travel_package->country) }}
                                            @else
                                                {{ $travel_package->country }}
                                            @endif
                                            @if ($travel_package->is_popular)
                                                <i class='bx bxs-star' style="color: #ffcc00; margin-left: 5px;"></i>
                                            @endif
                                        </small>
                                        <br>
                                        Starting From
                                        <h2 class="popular__price">
                                            IDR <span>{{ number_format($travel_package->price) }}</span>/pax
                                        </h2>
                                        <h3 class="popular__title">{{ $travel_package->title }}</h3>
                                        <p class="popular__description">{{ $travel_package->type }} - (Min.
                                            {{ $travel_package->min_pax }} Pax)</p>
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
    @endforeach

    <!--==================== VALUE ====================-->
    <section class="value section" id="value">
        <div class="value__container container grid">
            <div class="value__images">
                <div class="value__orbe"></div>

                <div class="value__img">
                    <img src="{{ asset('assets/img/team-new.jpeg') }}" alt="" />
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

    <!--==================== TESTIMONIALS / GOOGLE REVIEWS ====================-->
    <section class="testimonial section" id="testimonials">
        <div class="container">
            <span class="section__subtitle" style="text-align: center; display: block;">Real Experiences</span>
            <h2 class="section__title" style="text-align: center;">What Our Travelers Say</h2>

            {{-- Overall Rating Banner --}}
            @if(!is_null($placeRating))
            <div class="testimonial__rating-banner">
                <div class="testimonial__rating-logo">
                    <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" width="40" height="40">
                        <path fill="#EA4335" d="M24 9.5c3.5 0 6.5 1.3 8.9 3.4l6.6-6.6C35.5 2.5 30.1 0 24 0 14.7 0 6.7 5.4 2.7 13.4l7.7 6C12.3 13 17.7 9.5 24 9.5z"/>
                        <path fill="#4CAF50" d="M46.1 24.5c0-1.6-.1-3.2-.4-4.7H24v9h12.4c-.5 2.7-2.1 5-4.4 6.6l7.1 5.5c4.1-3.8 6.5-9.5 6.5-16.4z" />
                        <path fill="#FBBC05" d="M10.4 28.8A14.5 14.5 0 0 1 9.5 24c0-1.7.3-3.3.8-4.8l-7.7-6A23.9 23.9 0 0 0 0 24c0 3.9.9 7.5 2.6 10.8l7.8-6z"/>
                        <path fill="#1976D2" d="M24 48c6.1 0 11.2-2 14.9-5.4l-7.1-5.5c-2 1.3-4.5 2.1-7.8 2.1-6.3 0-11.7-4.3-13.6-10l-7.8 6C6.7 42.6 14.7 48 24 48z"/>
                    </svg>
                    <span class="testimonial__google-label">Google Reviews</span>
                </div>
                <div class="testimonial__rating-score">
                    <span class="testimonial__big-rating">{{ number_format($placeRating, 1) }}</span>
                    <div>
                        <div class="testimonial__stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= round($placeRating))
                                    <i class="bx bxs-star" style="color:#FBBC05"></i>
                                @else
                                    <i class="bx bx-star" style="color:#FBBC05"></i>
                                @endif
                            @endfor
                        </div>
                        <small class="testimonial__total">Based on {{ number_format($userRatingsTotal) }} reviews</small>
                    </div>
                </div>
            </div>
            @endif

            @if(count($reviews) > 0)
            {{-- Review Cards Slider --}}
            <div class="testimonial__container swiper" id="testimonialSwiper">
                <div class="swiper-wrapper">
                    @foreach($reviews as $review)
                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__card-header">
                            <img
                                src="{{ $review['profile_photo_url'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($review['author_name']) . '&background=3b82f6&color=fff&size=48' }}"
                                alt="{{ $review['author_name'] }}"
                                class="testimonial__avatar"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($review['author_name']) }}&background=3b82f6&color=fff&size=48'"
                            />
                            <div class="testimonial__author-info">
                                <h4 class="testimonial__author-name">{{ $review['author_name'] }}</h4>
                                <span class="testimonial__date">{{ \Carbon\Carbon::createFromTimestamp($review['time'])->diffForHumans() }}</span>
                            </div>
                            <div class="testimonial__google-icon">
                                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                    <path fill="#EA4335" d="M24 9.5c3.5 0 6.5 1.3 8.9 3.4l6.6-6.6C35.5 2.5 30.1 0 24 0 14.7 0 6.7 5.4 2.7 13.4l7.7 6C12.3 13 17.7 9.5 24 9.5z"/>
                                    <path fill="#4CAF50" d="M46.1 24.5c0-1.6-.1-3.2-.4-4.7H24v9h12.4c-.5 2.7-2.1 5-4.4 6.6l7.1 5.5c4.1-3.8 6.5-9.5 6.5-16.4z" />
                                    <path fill="#FBBC05" d="M10.4 28.8A14.5 14.5 0 0 1 9.5 24c0-1.7.3-3.3.8-4.8l-7.7-6A23.9 23.9 0 0 0 0 24c0 3.9.9 7.5 2.6 10.8l7.8-6z"/>
                                    <path fill="#1976D2" d="M24 48c6.1 0 11.2-2 14.9-5.4l-7.1-5.5c-2 1.3-4.5 2.1-7.8 2.1-6.3 0-11.7-4.3-13.6-10l-7.8 6C6.7 42.6 14.7 48 24 48z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="testimonial__stars-row">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bx {{ $i <= $review['rating'] ? 'bxs-star' : 'bx-star' }}" style="color:#FBBC05; font-size:0.9rem;"></i>
                            @endfor
                        </div>

                        <p class="testimonial__text">
                            {{ Str::limit($review['text'] ?? 'Great experience!', 200) }}
                        </p>
                    </div>
                    @endforeach
                </div>

                <div class="swiper-button-next testimonial__next"><i class="bx bx-chevron-right"></i></div>
                <div class="swiper-button-prev testimonial__prev"><i class="bx bx-chevron-left"></i></div>
            </div>
            <div class="swiper-pagination testimonial__pagination"></div>

            <div style="text-align:center; margin-top: 2rem;">
                <a href="https://www.google.com/maps/search/westtravel.id" target="_blank" rel="noopener noreferrer" class="button testimonial__cta-btn">
                    <i class="bx bx-map-pin"></i> See All Reviews on Google
                </a>
            </div>

            @else
            {{-- Fallback: No API key configured yet, show static reviews --}}
            <div class="testimonial__container swiper" id="testimonialSwiper">
                <div class="swiper-wrapper">
                    @php
                    $staticReviews = [
                        ['name' => 'Rina S.', 'rating' => 5, 'text' => 'Perjalanan yang luar biasa! West Travel memberikan layanan terbaik dari awal hingga akhir. Sangat direkomendasikan untuk wisata Lombok dan Rinjani!', 'initials' => 'RS'],
                        ['name' => 'Ahmad F.', 'rating' => 5, 'text' => 'Paket honeymoon kami sangat sempurna berkat West Travel. Tim mereka sangat responsif dan memastikan setiap detail terpenuhi. Terima kasih!', 'initials' => 'AF'],
                        ['name' => 'Sarah M.', 'rating' => 5, 'text' => 'Amazing service! The Rinjani trekking package was well-organized and the guides were professional. Best travel agency in Lombok!', 'initials' => 'SM'],
                        ['name' => 'Budi P.', 'rating' => 5, 'text' => 'Sudah 3x menggunakan jasa West Travel, selalu puas dengan pelayanannya. Harga terjangkau dengan kualitas premium.', 'initials' => 'BP'],
                        ['name' => 'Lisa K.', 'rating' => 5, 'text' => 'Paket internasional sangat worth it! Semuanya terorganisir dengan baik mulai dari tiket, hotel, hingga tour guide lokal.', 'initials' => 'LK'],
                    ];
                    @endphp
                    @foreach($staticReviews as $review)
                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__card-header">
                            <div class="testimonial__avatar testimonial__avatar-initials">
                                {{ $review['initials'] }}
                            </div>
                            <div class="testimonial__author-info">
                                <h4 class="testimonial__author-name">{{ $review['name'] }}</h4>
                                <span class="testimonial__date">Verified Traveler</span>
                            </div>
                            <div class="testimonial__google-icon">
                                <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                    <path fill="#EA4335" d="M24 9.5c3.5 0 6.5 1.3 8.9 3.4l6.6-6.6C35.5 2.5 30.1 0 24 0 14.7 0 6.7 5.4 2.7 13.4l7.7 6C12.3 13 17.7 9.5 24 9.5z"/>
                                    <path fill="#4CAF50" d="M46.1 24.5c0-1.6-.1-3.2-.4-4.7H24v9h12.4c-.5 2.7-2.1 5-4.4 6.6l7.1 5.5c4.1-3.8 6.5-9.5 6.5-16.4z" />
                                    <path fill="#FBBC05" d="M10.4 28.8A14.5 14.5 0 0 1 9.5 24c0-1.7.3-3.3.8-4.8l-7.7-6A23.9 23.9 0 0 0 0 24c0 3.9.9 7.5 2.6 10.8l7.8-6z"/>
                                    <path fill="#1976D2" d="M24 48c6.1 0 11.2-2 14.9-5.4l-7.1-5.5c-2 1.3-4.5 2.1-7.8 2.1-6.3 0-11.7-4.3-13.6-10l-7.8 6C6.7 42.6 14.7 48 24 48z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="testimonial__stars-row">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bx {{ $i <= $review['rating'] ? 'bxs-star' : 'bx-star' }}" style="color:#FBBC05; font-size:0.9rem;"></i>
                            @endfor
                        </div>

                        <p class="testimonial__text">{{ $review['text'] }}</p>
                    </div>
                    @endforeach
                </div>

                <div class="swiper-button-next testimonial__next"><i class="bx bx-chevron-right"></i></div>
                <div class="swiper-button-prev testimonial__prev"><i class="bx bx-chevron-left"></i></div>
            </div>
            <div class="swiper-pagination testimonial__pagination"></div>

            <div style="text-align:center; margin-top: 2rem;">
                <a href="https://www.google.com/maps/search/westtravel.id" target="_blank" rel="noopener noreferrer" class="button testimonial__cta-btn">
                    <i class="bx bx-map-pin"></i> See Our Google Reviews
                </a>
            </div>
            @endif
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

@push('script-alt')
<script>
    // Testimonial Swiper
    new Swiper('#testimonialSwiper', {
        loop: true,
        grabCursor: true,
        spaceBetween: 24,
        slidesPerView: 1,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.testimonial__pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.testimonial__next',
            prevEl: '.testimonial__prev',
        },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>
@endpush

