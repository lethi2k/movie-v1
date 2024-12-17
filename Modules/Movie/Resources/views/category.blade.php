@extends('movie::layouts.master')

@section('content')
<section id="body">
    <div class="container">
        <div class="head with-more with-tabs mt-5">
            <div class="title mr-3">Cập nhật gần đây</div>
        </div>
        <div class="aside-wrapper">
            <aside class="main">
                <form class="filters" action="{{ route('home.category') }}" method="get" autocomplete="off">
                    <div class="filter">
                        <input type="text" class="form-control" placeholder="Nhập từ khóa..." name="keyword"
                            value="{{ isset($filter['filter']['keyword']) ? $filter['filter']['keyword'] : '' }}">
                    </div>
                    <div class="filter">
                        <div class="dropdown responsive">
                            <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                                <span class="value" data-placeholder="Select genre" data-label-placement="true">

                                    @if (isset($filter['filter']['categories']))
                                    {{ count($filter['filter']['categories']) }}
                                    @else
                                    Chọn
                                    @endif
                                    thể loại phim
                                </span>
                            </button>
                            <div class="noclose dropdown-menu lg c4">
                                <ul class="genres">
                                    @foreach ($category_parents as $category_parent)
                                    <li title="{{ $category_parent->description->name }}">
                                        <input type="checkbox" id="{{ seo_url($category_parent->description->name) }}"
                                            name="categories[]" value="{{ $category_parent->category_id }}" @if(isset($filter['filter']['categories']) &&
                                            in_array($category_parent->category_id, $filter['filter']['categories']))
                                        checked="checked" @endif />
                                        <label for="{{ seo_url($category_parent->description->name) }}">{{
                                            $category_parent->description->name }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="filter">
                        <div class="dropdown responsive">
                            <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                <span class="value" data-placeholder="Select country" data-label-placement="true">
                                    @if (isset($filter['filter']['countries']))
                                    {{ count($filter['filter']['countries']) }}
                                    @else
                                    Chọn
                                    @endif
                                    quốc gia
                                </span>
                            </button>
                            <ul class="noclose dropdown-menu c1">
                                @foreach (countries() as $country)
                                <li title="{{ $country }}">
                                    <input type="checkbox" id="country-{{ seo_url($country) }}" name="countries[]"
                                        value="{{ $country }}" @if (isset($filter['filter']['countries']) &&
                                        in_array($country, $filter['filter']['countries'])) checked="checked" @endif />
                                    <label for="country-{{ seo_url($country) }}">{{ $country }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="filter">
                        <div class="dropdown responsive">
                            <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                                <span class="value" data-placeholder="Select year" data-label-placement="true">
                                    @if (isset($filter['filter']['years']))
                                    {{ count($filter['filter']['years']) }}
                                    @else
                                    Chọn
                                    @endif
                                    năm phát hành
                                </span>
                            </button>
                            <ul class="noclose dropdown-menu md c3">
                                @foreach (years() as $year)
                                <li>
                                    <input type="checkbox" id="year-{{ $year }}" name="years[]" value="{{ $year }}" @if(isset($filter['filter']['years']) && in_array($year,
                                        $filter['filter']['years'])) checked="checked" @endif />
                                    <label for="year-{{ $year }}">{{ $year }}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="submit filter w-auto">
                        <button class="btn btn-primary d-flex align-items-center">
                            <i class="fa-solid fa-filter"></i>
                            <span class="ml-1">Filter</span>
                        </button>
                    </div>
                </form>
                <div class="ani items">
                    @foreach ($products_latest as $product_latest)
                    <div class="item">
                        <div class="ani poster" data-tip="16673?/cache870767">
                            <a
                                href="{{ route('home.detail', ['slug' => seo_url($product_latest->description->name), 'episode' => 1]) }}">
                                <img src="{{ URL::asset($product_latest->image) }}" alt="Kawagoe Boys Sing" />
                                <div class="meta">
                                    <div class="inner">
                                        <span class="ep-status sub flex-fill"><span>
                                                {{ $product_latest->options->count() }}/{{ $product_latest->quantity
                                                }} Tập</span></span>
                                        <span class="ep-status dub flex-fill"><span>{{ strlen($product_latest->rate) ? $product_latest->rate : 9 }}</span></span>
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
                                @endif {{ $product_latest->description->name }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $products_latest->links('movie::common.pagination') }}
            </aside>
            <aside class="sidebar">
                <section id="top-anime">
                    <div class="head with-more with-tabs">
                        <div class="title">Xu hướng</div>
                        <div class="tabs">
                            {{-- <span data-name="day" class="tab active">Month</span> --}}
                        </div>
                    </div>
                    <div class="body">
                        <div class="scaff side items">
                            @foreach ($products_trending as $key => $product)
                            <a class="item rank{{ $key + 1 }}"
                                href="{{ route('home.detail', ['slug' => seo_url($product->description->name), 'episode' => 1]) }}">
                                <div class="inner">
                                    <div class="rank"></div>
                                    <div class="poster" data-tip="177?/cache9c22cb">
                                        <span><img src="{{ URL::asset($product->image) }}" alt="ONE PIECE" /></span>
                                    </div>
                                    <div class="info">
                                        <div class="name d-title" data-jp="ONE PIECE">
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
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
            // Attach click event listener to genres content
            $('.noclose').on('click', function(event) {
                // Prevent the event from propagating to the dropdown
                event.stopPropagation();
            });
        });

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