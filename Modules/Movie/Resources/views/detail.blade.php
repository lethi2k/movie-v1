@extends('movie::layouts.master')
@section('css')
    <style>
        #recent-update {
            border-bottom: 0px !important
        }
    </style>
@endsection
@section('content')
    <div id="body">
        <div id="watch-main">
            <div class="container watch-container">
                <div class="aside-wrapper">
                    <aside class="main">
                        <div id="w-media">
                            <div id="w-player">
                                <div id="artplayer-app"></div>

                                <div class="azlist py-3 border-episode">
                                    <div class="head">
                                        <div class="title">Thuyết minh</div>
                                    </div>
                                    <ul id="episode-list">
                                        @foreach ($product->options as $option_data)
                                            <li><a href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => $option_data->episode]) }}"
                                                    class="{{ $option_data->episode == $option->episode ? 'active' : '' }}">Tập
                                                    {{ $option_data->episode }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="w-info" class="border-episode pb-3">
                            <div class="binfo">
                                <div class="poster">
                                    <span>
                                        <img itemprop="image" src="{{ URL::asset($product->image) }}"
                                            alt="Kawagoe Boys Sing">
                                    </span>
                                </div>
                                <div class="info">
                                    <div class="tabs mb-3" style="width: max-content">
                                        <div data-name="information" class="tab active">
                                            Thông tin
                                        </div>
                                        <div data-name="performer" class="tab">
                                            Diễn viên
                                        </div>
                                        <div data-name="other" class="tab">Thông tin khác</div>
                                    </div>

                                    <div id="information" class="tab-content active">
                                        <h1 itemprop="name" class="title d-title" data-jp="Kawagoe Boys Sing">
                                            {{ $product->description->name }}
                                        </h1>
                                        {{-- <div class="names font-italic mb-2">
                                        Kawagoe Boys Sing; KAWAGOE BOYS SING -Now or Never-
                                    </div> --}}
                                        <div class="meta icons mb-3">
                                            <i class="rating">PG 13</i> <i class="quality">HD</i><i
                                                class="sub fas fa-closed-captioning"></i>
                                        </div>

                                        <div class="rating-box mb-3" itemprop="aggregateRating" itemscope=""
                                            itemtype="https://schema.org/AggregateRating" data-id="48715" data-score="9">
                                            <div class="score">
                                                <div> <span class="live-score"
                                                        itemprop="ratingValue">{{ strlen($product->rate) ? $product->rate : 9 }}</span>
                                                    / <span itemprop="bestRating">10</span> </div> <span
                                                    class="live-label">by
                                                    <span itemprop="reviewCount" style="display:none">1</span>2500
                                                    reviews</span>
                                            </div>
                                            <div class="stars">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-regular fa-star-half-stroke"></i></span>
                                                <span><i class="fa-regular fa-star fa-sm"></i></span>
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <div class="box-left">
                                                <ul class="InfoList">
                                                    <li class="AAIco-adjust"><strong>Trạng thái:</strong> Phim đang chiếu
                                                    </li>
                                                    <li class="AAIco-adjust"><strong>Thể loại:</strong>
                                                        @foreach ($product->categories as $category)
                                                            <a href="{{ route('home.category', ['categories' => [$category->category->category_id]]) }}"
                                                                title="{{ $category->category->description->name }}">{{ $category->category->description->name }}</a>,
                                                        @endforeach
                                                    </li>
                                                    {{-- <li class="AAIco-adjust"><strong>Đạo diễn:</strong> </li> --}}
                                                    <li class="AAIco-adjust"><strong>Quốc gia:</strong> <a
                                                            href="{{ route('home.category', ['countries' => [$product->location]]) }}"
                                                            title="{{ $product->location }}">{{ $product->location }}</a>
                                                    </li>
                                                    <li class="AAIco-adjust"><strong>Số người theo dõi:</strong> 3,284</li>
                                                </ul>
                                            </div>
                                            <div class="box-right">
                                                <ul class="InfoList">
                                                    <li class="AAIco-adjust"><strong>Thời lượng:</strong>
                                                        {{ $product->options->count() }}/{{ $product->quantity }}</li>
                                                    <li class="AAIco-adjust"><strong>Chất lượng:</strong> <span
                                                            class="Qlty">Full HD</span></li>
                                                    <li class="AAIco-adjust"><strong>Rating:</strong> <span
                                                            class="imdb">PG-13 -
                                                            Teens 13 tuổi trở lên</span></li>
                                                    <li class="AAIco-adjust"><strong>Ngôn ngữ:</strong> VietSub</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="synopsis mb-3">
                                            <div class="shorting">
                                                <div class="content">
                                                    {!! $product->description->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="performer" class="tab-content">
                                        Nội dung diễn viên
                                    </div>

                                    <div id="other" class="tab-content">
                                        Nội dung thông tin khác
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="watch-second" class="mt-5">
                            <div class="container watch-container">
                                <div class="aside-wrapper">
                                    <aside class="main">
                                        <section id="comments" data-src="//9anime-to.disqus.com/embed.js" data-id="kwxyr"
                                            data-load="true">
                                            <div class="head with-more with-tabs">
                                                <div class="title">Comments</div>
                                            </div>
                                            <div class="body">
                                                <div class="fb-comments"
                                                    data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                                                    data-width="100%" colorscheme="dark" data-numposts="10"></div>
                                            </div>
                                        </section>
                                    </aside>
                                </div>
                            </div>
                        </div> --}}
                        <section id="recent-update" class="mt-3">
                            <div class="head with-more with-tabs">
                                <div class="title mr-3">Cập nhật gần đây</div>
                            </div>
                            <div class="body">
                                <div class="ani items">
                                    @foreach ($products_latest as $product_latest)
                                        <div class="item">
                                            <div class="ani poster" data-tip="16673?/cache870767">
                                                <a
                                                    href="{{ route('home.detail', ['slug' => seo_url($product_latest->description->name), 'episode' => 1]) }}">
                                                    <img src="{{ URL::asset($product_latest->image) }}"
                                                        alt="{{ URL::asset($product_latest->image) }}">
                                                    <div class="meta">
                                                        <div class="inner">
                                                            <span class="ep-status sub flex-fill"><span>
                                                                    {{ $product_latest->options->count() }}/{{ $product_latest->quantity }} Tập</span></span>
                                                            <span class="ep-status dub flex-fill"><span>
                                                                {{ strlen($product_latest->rate) ? $product_latest->rate : 9 }}</span></span>
                                                            <span class="ep-status total flex-fill"><span>VIETSUB</span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <a class="name d-title"
                                                    href="{{ route('home.detail', ['slug' => seo_url($product_latest->description->name), 'episode' => 1]) }}"
                                                    data-jp="Kawagoe Boys Sing">
                                                    @if ($product_latest->warning != 0)
                                                        <span class="adult">{{ $product_latest->warning }}+</span>
                                                    @endif
                                                    {{ $product_latest->description->name }}
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{ $products_latest->links('movie::common.pagination') }}
                            </div>
                        </section>

                    </aside>
                    <aside class="sidebar">
                        <section class="w-side-section">
                            <div class="head">
                                <div class="title">Xu huớng</div>
                            </div>
                            <div class="scaff side items md">
                                @foreach ($products_trending as $product_trending)
                                    <a class="item"
                                        href="{{ route('home.detail', ['slug' => seo_url($product_trending->description->name), 'episode' => 1]) }}">
                                        <div class="inner">
                                            <div class="poster">
                                                <span><img src="{{ URL::asset($product_trending->image) }}"
                                                        alt="{{ $product_trending->description->name }}"></span>
                                            </div>
                                            <div class="info">
                                                <div class="name d-title">
                                                    {{ $product_trending->description->name }}
                                                </div>
                                                <div class="meta">
                                                    <span
                                                        class="ep-status sub flex-fill fa-eye"><span>{{ $product_trending->viewed }}</span></span>
                                                    <span
                                                        class="ep-status dub flex-fill"><span>{{ strlen($product_trending->rate) ? $product_trending->rate : 9 }}</span></span>
                                                    <span
                                                        class="ep-status total flex-fill"><span>{{ $product_trending->options->count() }}/{{ $product_trending->quantity }}</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </section>
                        <section class="w-side-section mt-5">
                            <div class="head">
                                <div class="title">Liên quan</div>
                            </div>
                            <div class="body">
                                <div class="scaff side items md">
                                    @foreach ($products_related as $product_related)
                                        <a class="item"
                                            href="{{ route('home.detail', ['slug' => seo_url($product_related->description->name), 'episode' => 1]) }}">
                                            <div class="inner">
                                                <div class="poster">
                                                    <span><img src="{{ URL::asset($product_related->image) }}"
                                                            alt="{{ $product_related->description->name }}"></span>
                                                </div>
                                                <div class="info">
                                                    <div class="name d-title">
                                                        {{ $product_related->description->name }}
                                                    </div>
                                                    <div class="meta">
                                                        <span
                                                            class="ep-status sub flex-fill fa-eye"><span>{{ $product_related->viewed }}</span></span>
                                                        <span class="ep-status dub flex-fill"><span>
                                                            {{ strlen($product_related->rate) ? $product_related->rate : 9 }}</span></span>
                                                        <span
                                                            class="ep-status total flex-fill"><span>{{ $product_related->options->count() }}/{{ $product_related->quantity }}</span></span>
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

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/artplayer/dist/artplayer.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
    <script type="text/javascript" src="https://animevietsub.fan/statics/default/js/jquery.cookie.js?v=1.1"></script>
    <script>
        var extend = getFileExtension("{{ $option->value }}")

        function getFileExtension(url) {
            var queryStringStart = url.indexOf('?');
            var urlWithoutQuery = (queryStringStart !== -1) ? url.substr(0, queryStringStart) : url;
            var parts = urlWithoutQuery.split('.');
            var fileExtension = parts[parts.length - 1];
            return fileExtension;
        }

        const headers = {
            'authority': 'storage.googleapiscdn.com',
            'accept': '*/*',
            'accept-language': 'vi-VN,vi;q=0.9,fr-FR;q=0.8,fr;q=0.7,en-US;q=0.6,en;q=0.5',
            'origin': 'https://animevietsub.fan',
            'referer': 'https://animevietsub.fan/',
            'sec-ch-ua': '"Google Chrome";v="113", "Chromium";v="113", "Not=A?Brand";v="24"',
            'sec-ch-ua-mobile': '?0',
            'sec-ch-ua-platform': '"Windows"',
            'sec-fetch-dest': 'empty',
            'sec-fetch-mode': 'cors',
            'sec-fetch-site': 'cross-site',
            'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 uacq',
        };

        var options = {
            container: '#artplayer-app',
            url: "{{ $option->value }}",
            poster: "{{ URL::asset($product->image) }}",
            type: extend,
            volume: 0.5,
            pip: true,
            headers: headers,
            autoSize: true,
            setting: true,
            autoplay: true,
            loop: true,
            flip: true,
            playbackRate: true,
            aspectRatio: true,
            fullscreen: true,
            fullscreenWeb: false,
            subtitleOffset: true,
            miniProgressBar: true,
            mutex: true,
            backdrop: true,
            playsInline: true,
            autoPlayback: true,
            airplay: true,
            theme: '#23ade5',
            lang: navigator.language.toLowerCase(),
            moreVideoAttr: {
                crossOrigin: 'anonymous',
                'webkit-playsinline': true,
                playsinline: true,
            },
            // quality: [{
            //     html: '1080P',
            //     url: "{{ $option->value }}",
            //     type: extend,
            // }],
            icons: {
                // loading: `<img src="{{ URL::asset('images/loading.gif') }}">`,
                state: '<img width="150" height="150" src="https://artplayer.org/assets/img/state.svg">',
                indicator: '<img width="16" height="16" src="https://artplayer.org/assets/img/indicator.svg">',
            },
        };

        // Thêm customType chỉ khi data.type là 'm3u8'
        if (extend == 'm3u8') {
            options.customType = {
                m3u8: playM3u8
            };
        }

        var art = new Artplayer(options);

        function playM3u8(video, url, art) {
            if (Hls.isSupported()) {
                if (art.hls) art.hls.destroy();
                const hls = new Hls();
                hls.loadSource(url);
                hls.attachMedia(video);
                art.hls = hls;
                art.on('destroy', () => hls.destroy());
            } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                video.src = url;
            } else {
                art.notice.show = 'Unsupported playback format: m3u8';
            }
        }

        $(document).ready(function() {
            $('.tab').click(function() {
                $('.tab').removeClass('active');
                $('.tab-content').removeClass('active');
                $(this).addClass('active');
                var tabName = $(this).data('name');
                $(`#${tabName}`).addClass('active');
            });
        });
    </script>
@endsection
