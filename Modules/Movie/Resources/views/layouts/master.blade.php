<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <title>hhvietsub - Watch Anime Online, Free Anime Streaming</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="keywords"
        content="anime, animetv, anime hay, anime vietsub, anime vietsub online, xem anime, anime tv, download anime vietsub, anime hd, tai anime, anime moi nhat, phim anime, hoat hinh nhat, anime tv">
    <meta
        content="Xem phim anime vietsub online xem trên điện thoại di động và máy tính nhanh nhất. Là một website xem phim anime vietsub miễn phí tốt nhất. Liên tục cập nhật các anime sớm nhất từ các fansub Việt Nam."
        name="description">
    <meta property="og:image" content="{{ asset('banner.png') }}">
    {{-- <meta property="og:logo" content="{{ asset('admin/assets/images/icon.svg') }}"> --}}
    <meta property="og:image:secure_url" content="{{ asset('banner.png') }}">
    <meta property="og:title" content="Anime Vietsub Online - hhvietsub">
    <meta property="og:description"
        content="Xem phim anime vietsub online xem trên điện thoại di động và máy tính nhanh nhất. Là một website xem phim anime vietsub miễn phí tốt nhất. Liên tục cập nhật các anime sớm nhất từ các fansub Việt Nam.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://rixgroup.vn">
    <meta property="og:site_name" content="Anime Vietsub Online - hhvietsub">
    <meta property="og:image:alt" content="Anime Vietsub Online - hhvietsub">
    <meta name="twitter:card"
        content="Xem phim anime vietsub online xem trên điện thoại di động và máy tính nhanh nhất. Là một website xem phim anime vietsub miễn phí tốt nhất. Liên tục cập nhật các anime sớm nhất từ các fansub Việt Nam.">
    <meta name="twitter:site" content="Anime Vietsub Online - hhvietsub">
    <meta name="twitter:creator" content="Anime Vietsub Online - hhvietsub">
    <meta name="twitter:url" content="http://rixgroup.vn">
    <meta name="twitter:title" content="Anime Vietsub Online - hhvietsub">
    <meta name="twitter:description"
        content="Xem phim anime vietsub online xem trên điện thoại di động và máy tính nhanh nhất. Là một website xem phim anime vietsub miễn phí tốt nhất. Liên tục cập nhật các anime sớm nhất từ các fansub Việt Nam.">
    <meta name="twitter:image" content="{{ asset('banner.png') }}">
    <meta name="twitter:image:width" content="500">
    <meta name="twitter:image:height" content="300">
    {{-- <link rel="canonical" href="http://rixgroup.vn"> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('admin/assets/images/icon.svg') }}" type="image/x-icon"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    @include('movie::layouts.css')
    @yield('css')
</head>

<body class="home">
    <div id="wrapper">
        @include('movie::layouts.header')
        @yield('content')
        @include('movie::layouts.footer')
    </div>
    @include('movie::layouts.js')
    @yield('js')
</body>

</html>
