@extends('layouts.app')
@section('meta')
    <?php use App\Helpers\Utility;$setting = Utility::setting();
    $content = isset($setting->content) ? json_decode($setting->content) : '';
    ?>
    <title>{{$cat->title_web}}</title>
    <meta name="description" content="{{$cat->meta_description}}">
    <meta property="og:title" content="{{$cat->title_web}}">
    <meta name="keywords" content="{{$cat->name}}">
    <meta property="og:description" content="{{$cat->meta_description}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::disk('admin')->url($cat->image_og)}}"/>
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
                        <a href="/tin-tuc">{{__('lang.news')}}</a>
                        <span class="sep">»</span>
                        <span class="current">{{$cat["name".$end]}}</span>
                    </div>
                    <h4 class="content-title">{{$cat["name".$end]}}</h4>
                    <div id="content">
                        <section class="news-section py-5">
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
                                {{ $posts->links('homes.pagination') }}
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

