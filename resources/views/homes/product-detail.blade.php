@extends('layouts.app')
@section('meta')
    <?php use App\Helpers\Utility;$setting = Utility::setting();
    $content = isset($setting->content) ? json_decode($setting->content) : '';
    ?>
    <title>{{$product["title_web"]}}</title>
    <meta name="description" content="{{$product->meta_description}}">
    <meta property="og:title" content="{{$product["title_web"]}}">
    <meta name="keywords" content="{{$product["title".$end]}}">
    <meta property="og:description" content="{{$product->meta}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::disk('admin')->url($product->image)}}"/>
@endsection
@push('css')
    <link rel="stylesheet" href="/assets/css/product.css">
    <link rel="stylesheet" href="/assets/libraries/Lightbox-Plugin-Pretty-Photo/css/prettyPhoto.css">
@endpush
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
                            <div class="big-item-nav-hoz {{$cat->id == $row->id ? "active":""}}">
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
                        <a href="/{{$cat->slug}}">{{$cat["name".$end]}}</a>
                        <span class="sep">»</span>
                        <span class="current">{{$product["title".$end]}}</span>
                    </div>
                    <div id="content">
                        <section class="product-detail py-4">
                            <div class="row">
                                    <!-- LEFT: GALLERY -->
                                    <div class="col-md-5">
                                        <div class="product-gallery">

                                            <!-- Ảnh chính -->
                                            <a id="a-main-image"
                                               href="javascript:void(0);">
                                                <img id="mainImage"
                                                     src="{{ Storage::disk('admin')->url($product->image) }}"
                                                     class="img-fluid main-image">
                                            </a>

                                            <!-- Thumbs -->
                                            <div class="thumbs mt-3">

                                                <!-- Ảnh đầu tiên -->
                                                <img data="{{ Storage::disk('admin')->url($product->image) }}"
                                                     src="{{ url('/uploads/').Utility::thumb($product->image,60,60) }}"
                                                     class="thumb active">

                                                <!-- Anchor ẩn cho gallery -->
                                                <a href="{{ Storage::disk('admin')->url($product->image) }}"
                                                   rel="prettyPhoto[gallery1]" style="display:none"></a>

                                                @for($i = 1; $i < 6; $i++)
                                                    @if(!empty($product["image".$i]))

                                                        <img data="{{ Storage::disk('admin')->url($product["image".$i]) }}"
                                                             class="thumb"
                                                             src="{{ url('/uploads/').Utility::thumb($product["image".$i],60,60) }}">

                                                        <!-- Anchor ẩn -->
                                                        <a href="{{ Storage::disk('admin')->url($product["image".$i]) }}"
                                                           rel="prettyPhoto[gallery1]"
                                                           style="display:none"></a>

                                                    @endif
                                                @endfor

                                            </div>
                                        </div>
                                    </div>

                                    <!-- RIGHT: INFO -->
                                    <div class="col-md-7">
                                        <h3 class="product-title">
                                            {{$product["title".$end]}}
                                        </h3>

                                        <p class="text-muted">
                                            {{__('lang.klt')}}: <strong>{{$product["donggoi".$end]}}</strong> |
                                            {{__('lang.view')}}: <strong>{{number_format($product->view,0)}}</strong>
                                        </p>

                                        <div class="product-features">
                                          {!! $product["des".$end] !!}
                                        </div>

                                        <!-- TAG -->
                                        <div class="product-tags mb-3">
                                            <i class="fas fa-tags" aria-hidden="true"></i>
                                            @if(!empty($product->tags))
                                                @foreach($product->tags as $row)
                                                    <a href="/tags/{{$row->slug}}">
                                                        <span class="tag">{{$row["name".$end]}}</span>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>

                                        <!-- RATING -->
                                        <div class="product-rating mb-3">
                                            @php
                                               $count = !empty($product->votes_avg_star) ? ceil($product->votes_avg_star) : 0;
                                            @endphp
                                            @if($count > 0)
                                            <span class="stars">
                                                @for($i=0;$i<$count;$i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                            </span>
                                            @endif
                                            <span class="ml-2">{{$product->votes_count}} {{__('lang.ldg')}}</span>
                                            <form class="needs-validation" id="form-star" novalidate>
                                                @csrf
                                                <div class="rating-form d-flex align-items-center mt-3">
                                                    <div class="position-relative">
                                                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                                        <select class="form-control rating-select form-select" name="star" id="validationTooltip03" required>
                                                            <option value="">{{__('lang.dgs')}}</option>
                                                            <option value="5">★★★★★ (5 {{__('lang.star')}})</option>
                                                            <option value="4">★★★★☆ (4 {{__('lang.star')}})</option>
                                                            <option value="3">★★★☆☆ (3 {{__('lang.star')}})</option>
                                                            <option value="2">★★☆☆☆ (2 {{__('lang.star')}})</option>
                                                            <option value="1">★☆☆☆☆ (1 {{__('lang.star')}})</option>
                                                        </select>
                                                        <div class="invalid-tooltip">
                                                            {{__('lang.plscs')}}
                                                        </div>
                                                    </div>
                                                    <button type="submit" id="btn-star" class="btn btn-success ml-2">
                                                        {{__('lang.send')}}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- CALL -->
                                        <a href="tel:{{$setting->phone}}"
                                           class="btn btn-success btn-lg">
                                            <i class="fas fa-phone"></i>
                                            {{__('lang.gdm')}}: {{$setting->phone}}
                                        </a>
                                    </div>

                                </div>
                        </section>
                        <section class="product-content py-4">
                          <div class="detail-box">
                                    <div class="detail-title">
                                        {{__('lang.detailinfo')}}
                                    </div>
                                    <div class="detail-content">
                                        {!!$product["content".$end]!!}
                                    </div>
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
    <script src="/assets/libraries/Lightbox-Plugin-Pretty-Photo/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $(".product-gallery a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
            $('#a-main-image').on('click', function () {

                let currentSrc = $('#mainImage').attr('src');
                let found = false;

                $("a[rel='prettyPhoto[gallery1]']").each(function () {
                    if ($(this).attr('href') === currentSrc) {
                        $(this).trigger('click');
                        found = true;
                        return false; // break each
                    }
                });

                // fallback: nếu không tìm thấy → mở ảnh đầu
                if (!found) {
                    $("a[rel='prettyPhoto[gallery1]']").first().trigger('click');
                }
            });
        });

        document.getElementById('form-star').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = this;
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }
            $('#btn-star').prop('disabled', true);
            const formData = new FormData(form);
            fetch("{{ url('/vote-star') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(async res => {
                    const data = await res.json();
                    if (!res.ok) throw data;
                    return data;
                })
                .then(data => {
                    if (data.status === 'error') {
                        toastr.warning(data.msg);
                    } else {
                        toastr.success(data.msg);
                        form.reset();
                        form.classList.remove('was-validated');
                    }
                })
                .catch(err => {
                    toastr.error(err?.msg ?? "{{__('lang.clxr')}}", "Lỗi");
                })
                .finally(() => {
                    $('#btn-star').prop('disabled', false);
                });
        });
    </script>
@endpush
