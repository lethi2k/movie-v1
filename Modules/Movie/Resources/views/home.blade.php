@extends('movie::layouts.master')

@section('content')
    <div id="body">
        <div class="hotest container">
            <div id="hotest" class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($products_banner as $product)
                    <div class="swiper-slide item">
                        <div class="info">
                            <h2 class="title d-title">
                                {{$product->description->name}}
                            </h2>
                            <div class="meta icons">
                                <i class="rating">PG 13</i> <i class="quality">HD</i><i
                                    class="sub fas fa-closed-captioning"></i>
                                <i class="dub fas fa-microphone"></i>
                                <i class="date">Oct 01, 2023</i>
                            </div>
                            <div class="synopsis">
                                {!! $product->description->description !!}
                            </div>
                            <div class="actions">
                                <a href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}" class="btn play btn-primary"><i
                                        class="fas fa-play"></i> Xem ngay</a>
                            </div>
                        </div>
                        <div class="image">
                            <div
                                style="background-image: url(' {{$product->image}}');">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="aside-wrapper">
                <aside class="main">
                    <section id="recent-update">
                        <div class="head with-more with-tabs">
                            <div class="title mr-3">Phim mới nổi bật</div>
                            <div class="end">
                                <a href="{{ route('home.category', ['order' => 'desc']) }}"
                                    class="btn play btn-primary view-more">Xem thêm</a>
                            </div>
                        </div>
                        <div class="body">
                            <div class="ani items">
                                @foreach ($products_latest as $product)
                                    <div class="item">
                                        <div class="ani poster">
                                            <a
                                                href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">
                                                <img src="{{ URL::asset($product->image) }}"
                                                    alt="{{ seo_url($product->description->name) }}" />
                                                <div class="meta">
                                                    <div class="inner">
                                                        <span class="ep-status sub flex-fill"><span>
                                                                {{ $product->options->count() }}/{{ $product->quantity }} tập</span></span>
                                                        <span class="ep-status dub flex-fill"><span>
                                                                {{ strlen($product->rate) ? $product->rate : 9 }}</span></span>
                                                        <span class="ep-status total flex-fill"><span>VIETSUB</span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="name d-title"
                                                href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">{{ $product->description->name }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </section>
                    <section id="recent-update">
                        <div class="head with-more with-tabs">
                            <div class="title mr-3">Anime nổi bật</div>
                            <div class="end">
                                <a href="{{ route('home.category', ['category' => seo_url('anime')]) }}"
                                    class="btn play btn-primary view-more">Xem thêm</a>
                            </div>
                        </div>
                        <div class="body">
                            <div class="ani items">
                                @foreach ($products_anime as $product)
                                    <div class="item">
                                        <div class="ani poster">
                                            <a
                                                href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">
                                                <img src="{{ URL::asset($product->image) }}"
                                                    alt="{{ seo_url($product->description->name) }}" />
                                                <div class="meta">
                                                    <div class="inner">
                                                        <span class="ep-status sub flex-fill"><span>
                                                                {{ $product->options->count() }}/{{ $product->quantity }}</span></span>
                                                        <span class="ep-status dub flex-fill"><span>
                                                            {{ strlen($product->rate) ? $product->rate : 9 }}</span></span>
                                                        <span class="ep-status total flex-fill"><span>VIETSUB</span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="name d-title"
                                                href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">{{ $product->description->name }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    <section id="recent-update">
                        <div class="head with-more with-tabs">
                            <div class="title mr-3">Phim lẻ mới cập nhật</div>
                            <div class="end">
                                <a href="{{ route('home.category', ['quality' => 1]) }}"
                                    class="btn play btn-primary view-more">Xem thêm</a>
                            </div>
                        </div>
                        <div class="body">
                            <div class="ani items">
                                @foreach ($products_rate as $product)
                                    <div class="item">
                                        <div class="ani poster">
                                            <a
                                                href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">
                                                <img src="{{ URL::asset($product->image) }}"
                                                    alt="{{ seo_url($product->description->name) }}" />
                                                <div class="meta">
                                                    <div class="inner">
                                                        <span class="ep-status sub flex-fill"><span>
                                                                {{ $product->options->count() }}/{{ $product->quantity }}</span></span>
                                                        <span class="ep-status dub flex-fill"><span>
                                                            {{ strlen($product->rate) ? $product->rate : 9 }}</span></span>
                                                        <span class="ep-status total flex-fill"><span>VIETSUB</span></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <a class="name d-title"
                                                href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">{{ $product->description->name }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </section>
                    <div id="schedule-block"></div>
                </aside>
                <aside class="sidebar">
                    <section id="top-anime">
                        <div class="head with-more with-tabs">
                            <div class="title">Xu hướng</div>
                        </div>
                        <div class="body">
                            <div class="scaff side items">
                                @foreach ($products_trending as $key => $product)
                                    <a class="item rank{{ $key + 1 }}"
                                        href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">
                                        <div class="inner">
                                            <div class="rank"></div>
                                            <div class="poster">
                                                <span><img src="{{ URL::asset($product->image) }}"
                                                        alt="{{ seo_url($product->description->name) }}" /></span>
                                            </div>
                                            <div class="info">
                                                <div class="name d-title">
                                                    {{ $product->description->name }}
                                                </div>
                                                <div class="meta">
                                                    <span class="ep-wrap dot">
                                                        <span class="ep-status sub flex-fill fa-eye"><span>
                                                                {{ $product->viewed }}</span></span>
                                                        <span class="ep-status dub flex-fill"><span>
                                                                {{ strlen($product->rate) ? $product->rate : 9 }}</span></span>
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.tab').click(function() {
                $('.tab').removeClass('active');
                $('.tab-content').removeClass('active');
                $(this).addClass('active');
                var tabName = $(this).data('name');
                $(`#${tabName}`).addClass('active');
            });
        });

        $(document).ready(function() {
            new Swiper('.swiper-container', {
                loop: true,
                slidesPerView: 1,
                paginationClickable: true,
                spaceBetween: 20,
                // autoplay: {
                //     delay: 2000,
                // },
                breakpoints: {
                    1920: {
                        slidesPerView: 1,
                        spaceBetween: 30
                    },
                    1028: {
                        slidesPerView: 1,
                        spaceBetween: 30
                    },
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 10
                    }
                }
            });
        });
    </script>
@endsection
