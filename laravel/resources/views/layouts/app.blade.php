<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- font awesame -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-free-5.15.4-web/css/all.css') }}">
    <!-- style.css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app/style.css') }}">
    <!-- unpkg -->
    {{-- <script src="https://unpkg.com/@barba/core"></script> --}}
    <!-- polyfill.io -->
    {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default%2CArray.prototype.find%2CIntersectionObserver" crossorigin="anonymous" defer></script> --}}
    <!-- jQuery3.6.0 -->
    <script src="{{ asset('plugins/jquery-3.6.0.min.js') }}"></script>
    <!-- javascript -->
    <script  src="{{ asset('js/summary-tab.js') }}"></script>
    {{-- <script src="{{ asset('js/modal.js') }}"></script> --}}
    <title>@yield('title')</title>
</head>

<body>
@if (!Auth::user()->restaurant_id)
    <div id="modal">
        <div id="js-modal__bg" class="bg-black"></div>
        <!-- modal-main is react -->
        <div id="modal-main"></div>
    </div>
@endif
    <div class="wrapper">
        <header id="header" class="header">
            @include('layouts.header')
        </header>
        <div id="side-menu">
            @include('layouts.side_menu')
        </div>
    </div>
    <main id="main" data-barba="container" data-barba-namespace="home">
        <div class="main-container">
            @include('app.components.header')
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </main>

    {{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        <br>{{ __('ログアウト') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <h1 class="youkoso">ようこそ！<span class="name">{{ Auth::user()->name }}</span>さま！</h1>
    <div class="button">
        @if(Auth::user()->table_count == null)
        <button type="button" onclick="location.href='tableCount_page'" class="btn btn-reserve">テーブル数登録</button>
        @else
        <button type="button" onclick="location.href='tableCount_page'" class="btn btn-reserve">テーブルQRコード表示</button>
        @endif
        <br>
        <button type="button" onclick="location.href='type_page'" class="btn btn-reserve">種類登録</button>
        <br>
        <button type="button" onclick="location.href='food_page'" class="btn btn-reserve">商品登録</button>
        <br>
        <button type="button" onclick="location.href='management_page'" class="btn btn-reserve">管理画面</button>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="http://localhost:8888/order_page/user_id=1&table=1">テーブル１page</a>
    </div> --}}
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</html>
