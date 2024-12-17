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
                    <div id="w-info" class="border-episode pb-3">
                        <div class="binfo">
                            <div class="poster">
                                <span>
                                    <img itemprop="image" src="{{ URL::asset($product->image) }}"
                                        alt="Kawagoe Boys Sing">
                                </span>
                                <div class="actions d-flex align-items-center justify-content-center mt-3 w-100">
                                    <a href="http://127.0.0.1:8000/xem-phim/boushoku-no-berserk/1"
                                        class="btn play btn-primary w-100"><i class="fas fa-play"></i> Xem ngay</a>
                                </div>
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
                                            <div> <span class="live-score" itemprop="ratingValue">{{ $product->rate ?
                                                    $product->rate : 'None' }}</span> / <span
                                                    itemprop="bestRating">10</span> </div> <span class="live-label">by
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
                                                    <a href="{{ route('home.category', ['categories' => [$category->category->category_id]]) }}" title="Anime bộ">{{
                                                        $category->category->description->name }}</a>,
                                                    @endforeach
                                                </li>
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

                    <div id="w-media my-3">
                        <div id="w-player">

                            <div class="azlist py-3 border-episode">
                                <div class="head">
                                    <div class="title">Thuyết minh</div>
                                </div>
                                <ul id="episode-list">
                                    @foreach ($product->options as $option_data)
                                    <li><a
                                            href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => $option_data->episode]) }}">Tập
                                            {{ $option_data->episode }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <section id="recent-update" class="mt-3">
                        <div class="head with-more with-tabs">
                            <div class="title mr-3">Recently Updated</div>
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
                                                            {{ $product_latest->options->count() }}/{{
                                                            $product_latest->quantity }}</span></span>
                                                    <span class="ep-status dub flex-fill"><span>
                                                            {{ $product_latest->rate }}</span></span>
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
            </div>
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
</script>
@endsection