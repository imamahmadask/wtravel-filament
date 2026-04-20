@extends('layouts.guest')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <section class="islands swiper-slide">
                    <img src="{{ asset('assets/img/hero.jpg') }}" alt="" class="islands__bg" />

                    <div class="islands__container container">
                        <div class="islands__data">
                            <h2 class="islands__subtitle">Support</h2>
                            <h1 class="islands__title">FAQs</h1>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!--==================== FAQ ====================-->
    <section class="section" id="faq">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">Common Questions</span>
            <h2 class="section__title" style="text-align: center">
                Frequently Asked Questions
            </h2>

            <div class="faq__container grid">
                @foreach ($faqs as $faq)
                    <div class="value__accordion-item">
                        <header class="value__accordion-header">
                            <i class="bx bxs-help-circle value-accordion-icon"></i>
                            <h3 class="value__accordion-title">
                                {{ $faq->question }}
                            </h3>
                            <div class="value__accordion-arrow">
                                <i class="bx bxs-down-arrow"></i>
                            </div>
                        </header>
                        <div class="value__accordion-content">
                            <p class="value__accordion-description">
                                {{ $faq->answer }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('style-alt')
    <style>
        .faq__container {
            row-gap: 1.5rem;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
@endpush
