@extends('layouts.app')
@section('meta')
    <?php use App\Helpers\Utility;$setting = Utility::setting();
    $content = isset($setting->content) ? json_decode($setting->content) : '';
    ?>
    <title>{{$post["title".$end]}}</title>
    <meta name="description" content="{{$post->meta}}">
    <meta property="og:title" content="{{$post["title".$end]}}">
    <meta name="keywords" content="{{$post["title".$end]}}">
    <meta property="og:description" content="{{$post->meta}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::disk('admin')->url($post->thumbnail)}}"/>
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
                            <h3 class="text">{{__('lang.news')}}</h3>
                            <div class="line"><span class="color-line"></span></div>
                        </div>
                        @foreach($cats as $row)
                            <div class="big-item-nav-hoz {{$cat->id == $row->id ? "active":""}}">
                                <a href="{{url('/').'/tin-tuc/'.$row->slug}}" class="item-nav-hoz-vns">{{$row["name".$end]}}
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
                        <a href="/tin-tuc/{{$cat->slug}}">{{$cat["name".$end]}}</a>
                        <span class="sep">»</span>
                        <span class="current">{{$post["title".$end]}}</span>
                    </div>
                    <h4 class="content-title">{{$cat["name".$end]}}</h4>
                    <div class="prg-feature content-style-vns">


                        <h3 class="main-title" style="text-transform: initial">{{$post["title".$end]}}</h3>
                        <div class="wp-btn-share">
                            <div class="btn-detail-title">
                                <p class="btn-detail-time">{{date('d/m/Y',strtotime($post->created_at))}}</p>
                            </div>
                            <div class="btn-share-fb">
                                <div class="fb-like" data-href="https://bancaygiong.com.vn" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>
                            </div>
                        </div>
                        <div class="wp-news-body-content">
                          {!! $post['content'.$end] !!}
                        </div>
                    </div>
                    <div id="content">
                        <section class="news-section py-5">
                            <h3 class="title-line-bot-vns text-uppercase">{{__('lang.tlq')}}</h3>
                            <div class="container">
                            @foreach($posts as $k=>$row)
                                <?php if($k%3==0) echo '<div class="row">'?>
                                <!-- Item -->
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <a href="/bai-viet/{{$row["slug"]}}" title="{{$row["title".$end]}}">
                                            <div class="news-card">
                                                <div class="news-thumb">
                                                    <img src="{{Storage::disk('admin')->url($row->image)}}" alt="">
                                                </div>
                                                <h3 class="news-title">
                                                    {{$row["title".$end]}}
                                                </h3>
                                                <div class="news-meta">
                                                    <span class="news-tag">{{$cat["name".$end]}}</span>
                                                    <span class="news-date">{{date('d/m/Y',strtotime($row->created_at))}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php if($k%3==2) echo '</div>'?>
                                @endforeach
                                <?php if(isset($k) && $k%3 > 0) echo '</div>'?>
                            </div>
                    </div>
                    </section>
                </div>
            </div>
        </div>

    </div>
    </div>
@stop
@push('js')
@endpush

