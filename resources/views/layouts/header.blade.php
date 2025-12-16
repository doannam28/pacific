<?php $setting = App\Helpers\Utility::setting(); ?>
<!-- TOP BAR -->
<div class="top-bar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-12 text-md-left">
                @php
                    $locale = app()->getLocale();
                @endphp
                <div class="dropdown d-inline-block lang-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if ($locale === 'en')
                            <img src="https://flagcdn.com/w20/gb.png" alt="EN">
                            EN
                        @else
                            <img src="https://flagcdn.com/w20/vn.png" alt="VN">
                            VN
                        @endif
                    </a>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('lang.switch', 'vi') }}">
                            🇻🇳 Tiếng Việt
                        </a>
                        <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
                            🇬🇧 English
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 text-md-right text-center bar-right">
                <a href="tel:{{$setting->phone}}">
                <i class="fas fa-phone"></i> {{$setting->phone}}</a>
                <span class="mx-2">|</span>
                <a href="mailto:{{$setting->email}}">
                    <i class="fas fa-envelope"></i> {{$setting->email}}</a>
                <span class="ml-2">
          <a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="{{$setting->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                    <!-- SEARCH ICON -->
          <a href="#" class="search-toggle">
            <i class="fas fa-search"></i>
          </a>
        </span>

            </div>
        </div>
    </div>
    <div class="search-box-wrapper">
        <div class="container">
            <div class="d-flex justify-content-center">
                <form action="tim-kiem" method="GET" class="search-box">
                    <input type="text" name="name" class="form-control" placeholder="{{__('lang.search')}}" required>
                    <button type="submit" class="btn-search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- HEADER / MENU -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
            <div class="d-block d-md-none div-logo">
                <div>
                    <img src="{{Storage::disk('admin')->url($setting->logo)}}" alt="Logo">
                </div>
            </div>
            <!-- LEFT MENU -->
            <div class="collapse navbar-collapse navbar-left">
                <ul class="navbar-nav w-100 justify-content-end">
                    <li class="nav-item"><a class="nav-link" href="#"> <i class="fas fa-home mr-1"></i>{{ __('lang.home') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('lang.about') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('lang.product') }}</a></li>
                </ul>
            </div>

            <!-- LOGO CENTER -->
            <a class="navbar-brand navbar-logo d-none d-md-block" href="/">
                <div class="div-logo">
                    <div>
                        <img src="{{Storage::disk('admin')->url($setting->logo)}}" alt="Logo">
                    </div>
                </div>
            </a>

            <!-- RIGHT MENU -->
            <div class="collapse navbar-collapse navbar-right">
                <ul class="navbar-nav w-100 justify-content-start">
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('lang.news') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('lang.career') }}</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">{{ __('lang.contact') }}</a></li>
                </ul>
            </div>

            <!-- TOGGLER -->
            <button class="navbar-toggler collapsed" type="button"
                    data-toggle="collapse"
                    data-target=".navbar-collapse"
                    aria-expanded="false">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </div>
</header>
