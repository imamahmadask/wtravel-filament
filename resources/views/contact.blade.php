@extends('layouts.guest')

@push('style-alt')
    <style>
        .map-container {
            position: relative;
            padding-bottom: 56.25%;
            /* Rasio aspek 16:9 */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #f0f0f0;
            margin-top: 4rem;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
@endpush

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <!--========== ISLANDS 1 ==========-->
                <section class="islands swiper-slide">
                    <img src="{{ asset('assets/img/contact-hero.jpg') }}" alt="" class="islands__bg" />
                    <div class="bg__overlay">
                        <div class="islands__container container">
                            <div class="islands__data">
                                <h1 class="islands__title">Contact Us</h1>
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
                    <img src="{{ asset('assets/img/contact.jpg') }}" alt="" />
                </div>
            </div>

            <div class="contact__content">
                <div class="contact__data">
                    <span class="section__subtitle">Need Help</span>
                    <h2 class="section__title">Don't hesitate to contact us</h2>
                    <p class="contact__description">
                        Is there a problem finding places for yout next trip? Need a
                        guide in first trip or need a consultation about traveling? just
                        contact us.
                    </p>
                </div>

                <div class="contact__card">
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxs-phone-call"></i>
                            <div>
                                <h3 class="contact__card-title">Call</h3>
                                <p class="contact__card-description">+6285253219288</p>
                            </div>
                        </div>

                        <a type="button" class="button contact__card-button" style="text-align: center"
                            href="tel:6285253219288" target="_blank">
                            Call Now
                        </a>
                    </div>
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxs-message-rounded-dots"></i>
                            <div>
                                <h3 class="contact__card-title">Whatsapp</h3>
                                <p class="contact__card-description">+6285253219288</p>
                            </div>
                        </div>

                        <a type="button" class="button contact__card-button" style="text-align: center"
                            href="https://wa.me/6285253219288" target="_blank">
                            Chat Now
                        </a>
                    </div>
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxs-envelope"></i>
                            <div>
                                <h3 class="contact__card-title">Email</h3>
                                <p class="contact__card-description">
                                    westtravelindonesia<br>
                                    @gmail.com
                                </p>
                            </div>
                        </div>

                        <a type="button" class="button contact__card-button" style="text-align: center"
                            href="mailto:westtravelindonesia@gmail.com" target="_blank">
                            Email Now
                        </a>
                    </div>
                    <div class="contact__card-box">
                        <div class="contact__card-info">
                            <i class="bx bxl-instagram-alt"></i>
                            <div>
                                <h3 class="contact__card-title">Instagram</h3>
                                <p class="contact__card-description">@westtravel.id</p>
                            </div>
                        </div>

                        <a type="button" class="button contact__card-button" style="text-align: center"
                            href="https://instagram.com/westtravel.id/" target="_blank">
                            Follow Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.4275039534914!2d116.11369342485352!3d-8.554824890823589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdc18302628daf%3A0xe5bd38e3ab5a44aa!2sWEST%20TRAVEL%20ID!5e0!3m2!1sen!2sid!4v1720857286078!5m2!1sen!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
