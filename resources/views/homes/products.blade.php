@extends('layouts.app')
@section('meta')
    <?php use App\Helpers\Utility;$setting = Utility::setting();
    $content = isset($setting->content) ? json_decode($setting->content) : '';
    ?>
    <title>{{$cat->title_web ?? $title}}</title>
    <meta name="description" content="{{$cat->meta_description ?? $title}}">
    <meta property="og:title" content="{{$cat->title_web ?? $title}}">
    <meta name="keywords" content="{{$cat->name ?? $title}}">
    <meta property="og:description" content="{{$cat->meta_description ?? $title}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::disk('admin')->url($cat->image_og ?? $setting->image_og)}}"/>
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
                            <h3 class="text">{{__('lang.catproduct')}}</h3>
                            <div class="line"><span class="color-line"></span></div>
                        </div>
                        @foreach($cats as $row)
                            <div class="big-item-nav-hoz {{!empty($cat->id) && $cat->id == $row->id ? "active":""}}">
                                <a href="{{url('/').'/'.$row->slug}}" class="item-nav-hoz-vns">{{$row["name".$end]}}
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
                        <a href="/san-pham">{{__('lang.product')}}</a>
                        <span class="sep">»</span>
                        <span class="current">{{$title}}</span>
                    </div>
                    @if(!empty($cat["name"]))
                        <h4 class="content-title">{{$cat["name".$end]}}</h4>
                        <div class="des">{!! $cat['description'.$end] !!}</div>
                    @endif
                    <div id="content">
                        <section class="news-section py-5">
                            <div class="container">
                                    @foreach($posts as $k=>$row)
                                        <?php if($k%3==0) echo '<div class="row">';
                                        ?>
                                    <!-- Item -->
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <a href="/{{$row->category->slug}}/{{$row["slug"]}}" title="{{$row["title".$end]}}">
                                            <div class="news-card">
                                                <div class="news-thumb">
                                                    <img src="{{Storage::disk('admin')->url($row->image)}}" alt="">
                                                </div>
                                                <h3 class="h3-product text-center">
                                                    {{$row["title".$end]}}
                                                </h3>
                                                <div class="truong danhgia text-center">
                                                    @php
                                                         $count = !empty($row->votes_avg_star) ? ceil($row->votes_avg_star) : 0;
                                                    @endphp
                                                    @if($count > 0)
                                                        @for($i=0;$i<$count;$i++)
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        @endfor
                                                        <span class="luot_danhgia">({{$row->votes_count}})</span>
                                                    @endif
                                                </div>
                                                <p class="text-center">{{__('lang.klt')}}: {{$row["donggoi".$end]}}</p>
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
    @include('layouts.block_contact')
@stop
@push('js')
@endpush

