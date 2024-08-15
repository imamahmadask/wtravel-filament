@extends('layouts.guest')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <!--========== ISLANDS 1 ==========-->
                <section class="islands swiper-slide">
                    <img src="{{ asset('assets/img/contact-hero-new.png') }}" alt="" class="islands__bg" />
                    <div class="bg__overlay">
                        <div class="islands__container container">
                            <div class="islands__data">
                                {{-- <h2 class="islands__subtitle">Get to know</h2> --}}
                                <h1 class="islands__title">About Us</h1>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!--==================== CONTACT ====================-->
    <section class="contact section" id="contact">
        <div class="contact__container container grid">
            <div class="contact__images">
                <div class="contact__orbe"></div>

                <div class="contact__img">
                    <img src="{{ asset('assets/img/contact-new.jpeg') }}" alt="" />
                </div>
            </div>

            <div class="contact__content">
                <div class="contact__data">
                    <h2 class="section__title">The Story Behind West Travel</h2>
                    <p class="contact__description">
                        West Travel was born from the passion and shared love for travel of a couple determined to make a
                        difference in the tourism industry. Our journey began with the unique combination of a seasoned
                        travel enthusiast and an experienced tourism professional.
                    </p>

                    <span class="section__subtitle">
                        <b>My Industry Expertise</b>
                    </span>
                    <p>
                        I, Ande, brought a wealth of knowledge from my background in the tourism industry. With extensive
                        experience as a dive master in the stunning Gili Islands, I understood the intricate workings of
                        tourism and the profound impact travel can have on people's lives. Initially, I was skeptical about
                        traveling for leisure, viewing it as an unnecessary expense rather than an enriching experience.
                    </p>
                    <br>
                    <span class="section__subtitle">
                        <b>My Wife's Love for Adventure</b>
                    </span>
                    <p>
                        Before marriage, my wife, Ulva, had already explored many parts of the world. Her adventurous spirit
                        and love for discovering new places inspired her to continue traveling even after settling down. Her
                        travels allowed her to experience different cultures, cuisines, and landscapes, broadening her
                        perspective and deepening her appreciation for the beauty our world offers.
                    </p>
                    <br>
                    <span class="section__subtitle">
                        <b>A Transformative Honeymoon Experience</b>
                    </span>
                    <p>
                        The turning point for West Travel came during our honeymoon in Japan, our first adventure together.
                        This trip opened Ande's eyes to the transformative power of travel. The beauty, excitement, and
                        cultural immersion in Japan ignited a newfound passion for exploration. Witnessing the joy and
                        discovery that travel brought into their lives, we realized we wanted to share this incredible
                        experience with others.
                    </p>
                    <br>
                    <span class="section__subtitle">
                        <b>Our Mission and Vision</b>
                    </span>
                    <p>
                        Inspired by our journey, we founded West Travel with a simple yet profound mission: to make travel
                        accessible, enjoyable, and memorable for everyone. We believe that travel should not be a luxury but
                        a possibility for all, breaking barriers and bringing people closer to the wonders of the world.
                        <br>
                        At West Travel, our goal is to simplify the travel experience, offering affordable packages without
                        compromising on quality or authenticity. We strive to create tailor-made journeys that cater to
                        various preferences and budgets, ensuring that everyone can embark on their adventure, regardless of
                        their background or experience level.
                    </p>
                    <br>
                    <span class="section__subtitle">
                        <b>Join Us on This Journey</b>
                    </span>
                    <p>
                        Whether you're a seasoned traveler or taking your first steps into the world of exploration, West
                        Travel is here to guide you. Let us take you on a journey filled with excitement, discovery, and
                        unforgettable memories. We invite you to explore the world with us and experience the joy of travel
                        that sparked our own adventure.
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection
