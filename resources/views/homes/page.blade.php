@extends('layouts.app')
@section('meta')
    <?php use App\Helpers\Utility;$setting = Utility::setting();
    $content = isset($setting->content) ? json_decode($setting->content) : '';
    ?>
    <title>{{$page->title}}</title>
    <meta name="description" content="{{$page->meta_description}}">
    <meta property="og:title" content="{{$page->title}}">
    <meta name="keywords" content="{{$page->title}}">
    <meta property="og:description" content="{{$page->meta_description}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::disk('admin')->url($page->image_og)}}"/>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="page-banner mb-4" style="background: url('{{Storage::disk('admin')->url($setting->banner)}}') center / cover no-repeat;"></div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <!-- ===== SIDEBAR ===== -->
            <div class="col-lg-3 col-md-4">
                <div class="sidebar-wrapper">
                    <div class="sidebar">
                        <div class="title-nav">
                            <h3 class="text">{{$title}}</h3>
                            <div class="line"><span class="color-line"></span></div>
                        </div>
                        @foreach($pages as $row)
                            <div class="big-item-nav-hoz {{$page->id == $row->id ? "active":""}}">
                                <a href="{{$link.'/'.$row->slug}}" class="item-nav-hoz-vns">{{$row["title".$end]}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="col-lg-9 col-md-8">
                <div class="content-box">
                    <div class="custom-breadcrumb">
                        <a href="/">{{__('lang.home')}}</a>
                        <span class="sep">»</span>
                        <a href="{{$link}}">{{$title}}</a>
                        <span class="sep">»</span>
                        <span class="current">{{$page["title".$end]}}</span>
                    </div>
                    <h4 class="content-title">{{$page["title".$end]}}</h4>
                    <div id="content">
                        {!! $page["content".$end] !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
@push('js')
@endpush

