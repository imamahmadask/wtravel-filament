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
                    <h2 class="section__title">About Us</h2>
                    <p class="contact__description">
                        West Travel is dedicated to turning your travel dreams into reality. Our comprehensive services
                        cover every aspect of your journey, ensuring a seamless and memorable experience. Whether you’re
                        planning a leisurely vacation, a business trip, or a last-minute getaway, West Travel is here to
                        make it happen. Let us take care of the details so you can focus on enjoying the adventure.
                    </p>

                    <span class="section__subtitle">
                        <b>Services :</b>
                    </span>
                    <p>
                    <ol>
                        <li>
                            Tour Packages: Explore our handpicked tour packages for unique experiences and unforgettable
                            adventures, from cultural excursions to beach holidays.
                        </li>
                        <li>
                            Transportation Services: Enjoy hassle-free travel with our reliable transportation options,
                            including airport transfers and car rentals.
                        </li>
                        <li>
                            Passport and Visa Processing: Simplify your international travel with our efficient passport and
                            visa processing services. We handle the paperwork for you.
                        </li>
                        <li>
                            Plane Tickets: Easily book your flights with West Travel. We offer competitive prices and
                            flexible options to find the best deals for your travel dates.
                        </li>
                        <li>
                            Hotel Reservations: Find the perfect place to stay with our hotel reservation services, from
                            budget-friendly options to luxury resorts.
                        </li>
                    </ol>
                    <br>
                    Let us handle the details so you can focus on enjoying your journey.
                    </p>
                    <br>
                    <span class="section__subtitle">
                        <b>Mission :</b>
                    </span>
                    <p>
                        At West Travel, our mission is to change the way people think about traveling. We believe it doesn't
                        have to be expensive or complicated. We strive to provide exceptional travel services that exceed
                        our clients' expectations, offering personalized solutions and creating memorable experiences that
                        are affordable and hassle-free for every traveler.
                    </p>
                    <br>
                    <span class="section__subtitle">
                        <b>Vision :</b>
                    </span>
                    <p>
                        Our vision is to be the leading travel agency known for our reliability, customer focus, and
                        innovative solutions. We aim to inspire and empower people to explore the world with confidence and
                        excitement.
                    </p>

                </div>
            </div>
        </div>
    </section>
@endsection
