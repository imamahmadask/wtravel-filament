@extends('layouts.guest')

@push('style-alt')
    <style>
        .filter-container {
            max-width: 500px;
            margin: 0 auto 3rem;
            padding: 0 1rem;
        }

        .filter-select {
            display: block;
            width: 100%;
            padding: .75rem 2.25rem .75rem 1.25rem;
            font-size: 1.1rem;
            font-weight: 500;
            line-height: 1.5;
            color: var(--title-color);
            background-color: var(--container-color);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='hsl(228, 66%, 53%)' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1.25rem center;
            background-size: 18px 14px;
            border: 2px solid #f0f0f0;
            border-radius: 1rem;
            transition: all .3s ease;
            appearance: none;
            cursor: pointer;
            box-shadow: 0 10px 20px hsla(228, 66%, 45%, 0.06);
        }

        .filter-select:focus {
            border-color: var(--first-color);
            outline: 0;
            box-shadow: 0 10px 25px hsla(228, 66%, 53%, 0.2);
            transform: translateY(-2px);
        }

        .dark-theme .filter-select {
            border-color: var(--border-color);
            background-color: var(--container-color);
        }
    </style>
@endpush

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
            <span class="section__subtitle" style="text-align: center">Selection</span>
            <h2 class="section__title" style="text-align: center">
                Filter Package
            </h2>

            <div class="filter-container">
                <select class="filter-select" onchange="location = this.value;">
                    <option value="{{ route('travel_package.index') }}" {{ !$selectedGroup ? 'selected' : '' }}>
                        All Groups
                    </option>
                    @foreach ($orderedGroups as $group)
                        <option value="{{ route('travel_package.index', ['group' => $group]) }}"
                            {{ $selectedGroup == $group ? 'selected' : '' }}>
                            {{ $group }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </section>

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
