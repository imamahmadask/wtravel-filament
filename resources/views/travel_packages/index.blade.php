@extends('layouts.guest')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <section class="islands swiper-slide">
                    <img src="{{ asset('assets/img/bali.jpg') }}" alt="" class="islands__bg" />

                    <div class="islands__container container">
                        <div class="islands__data">
                            <h2 class="islands__subtitle">Explore</h2>
                            <h1 class="islands__title">Travel Packages</h1>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!--==================== POPULAR ====================-->
    <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">All</span>
            <h2 class="section__title" style="text-align: center">
                Travel Packages
            </h2>

            <div class="popular__all">
                @foreach ($travel_packages as $travel_package)
                    <article class="popular__card">
                        <a href="{{ route('travel_package.show', $travel_package->slug) }}">
                            <img src="{{ Storage::url($travel_package->images[0]) }}" alt="" class="popular__img" />
                            <div class="popular__data">
                                <small> <i class='bx bxs-flag-alt'></i>
                                    @if (is_array($travel_package->country) && count($travel_package->country) > 0)
                                        {{ implode(', ', $travel_package->country) }}
                                    @else
                                        {{ $travel_package->country }} <!-- Jika hanya 1 negara atau string biasa -->
                                    @endif
                                </small>
                                <br>
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
        </div>
    </section>
@endsection
