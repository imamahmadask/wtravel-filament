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
    @foreach ($travel_packages->groupBy('group_package') as $group => $packages)
        <section class="section">
            <div class="container">
                <span class="section__subtitle" style="text-align: center">Package Travel</span>
                <h2 class="section__title" style="text-align: center">
                    {{ $group ?: 'Other' }}
                </h2>

                <div class="popular__all">
                    @foreach ($packages as $travel_package)
                        <article class="popular__card">
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
            </div>
        </section>
    @endforeach
@endsection
