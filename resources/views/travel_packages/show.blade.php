@extends('layouts.guest')

@section('content')
    <!--==================== HOME ====================-->
    <section>
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                @foreach ($travel_package->images as $gallery)
                    <section class="islands swiper-slide">
                        <img src="{{ Storage::url($gallery) }}" alt="" class="islands__bg" />
                    </section>
                @endforeach
            </div>
        </div>

        <!--========== CONTROLS ==========-->
        <div class="controls gallery-thumbs">
            <div class="controls__container swiper-wrapper">
                @foreach ($travel_package->images as $gallery)
                    <img src="{{ Storage::url($gallery) }}" alt="" class="controls__img swiper-slide" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="blog section" id="blog">
        <div class="blog__container container">
            <div class="content__container">
                <div class="blog__detail">
                    {!! $travel_package->description !!}
                </div>
                <div class="package-travel">
                    <h3>Booking Now</h3>
                    <div class="card">
                        <form action="{{ route('booking.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="travel_package_id" value="{{ $travel_package->id }}">
                            <input type="text" name="name" placeholder="Your Name" />
                            <input type="email" name="email" placeholder="Your Email" />
                            <input type="number" name="number_phone" placeholder="Your Number" />
                            <input placeholder="Pick Your Date" class="textbox-n" type="text" name="date"
                                onfocus="(this.type='date')" id="date" />
                            <button type="submit" class="button button-booking">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="popular">
        <div class="container">
            <span class="section__subtitle" style="text-align: center">Package Travel</span>
            <h2 class="section__title" style="text-align: center">
                The Best Tour For You
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
                                        {{ $travel_package->country }}
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

    @if (session()->has('message'))
        <div id="alert" class="alert">
            {{ session()->get('message') }}
            <i class='bx bx-x alert-close' id="close"></i>
        </div>
    @endif
@endsection

@push('style-alt')
    <style>
        .alert {
            position: absolute;
            top: 120px;
            left: 0;
            right: 0;
            background-color: var(--second-color);
            color: white;
            padding: 1rem;
            width: 70%;
            z-index: 99;
            margin: auto;
            border-radius: .25rem;
            text-align: center;
        }

        .alert-close {
            font-size: 1.5rem;
            color: #090909;
            position: absolute;
            top: .25rem;
            right: .5rem;
            cursor: pointer;
        }

        blockquote {
            border-left: 8px solid #b4b4b4;
            padding-left: 1rem;
        }

        .blog__detail ul li {
            list-style: initial;
        }
    </style>
@endpush

@push('script-alt')
    <script>
        let galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 0,
            slidesPerView: 0,
        });

        let galleryTop = new Swiper('.gallery-top', {
            effect: 'fade',
            loop: true,

            thumbs: {
                swiper: galleryThumbs,
            },
        });

        const close = document.getElementById('close');
        const alert = document.getElementById('alert');
        if (close) {
            close.addEventListener('click', function() {
                alert.style.display = 'none';
            })
        }
    </script>
@endpush
