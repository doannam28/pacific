@extends('layouts.app')
@section('meta')
    <?php use App\Helpers\Utility;$setting = Utility::setting();
    $content = isset($setting->content) ? json_decode($setting->content) : '';
    ?>
    <title>{{__('lang.contact')}}</title>
    <meta name="description" content="{{$setting->meta_description}}">
    <meta property="og:title" content="{{$setting->site_title}}">
    <meta name="keywords" content="{{$setting->site_title}}">
    <meta property="og:description" content="{{$setting->meta_description}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Storage::disk('admin')->url($setting->image_og)}}"/>
@endsection
@section('content')
    <!-- BANNER -->
    <div class="page-banner mb-4"
         style="background: url('{{Storage::disk('admin')->url($setting->banner)}}') center / cover no-repeat;"></div>

    <!-- CONTENT -->
    <div class="container">
        <div class="row">
            <!-- MAIN CONTENT -->
            <div class="col-lg-12 col-md-12">
                <div class="content-box">
                    <div class="custom-breadcrumb">
                        <a href="/">{{__('lang.home')}}</a>
                        <span class="sep">»</span>
                        <span class="current">{{__('lang.contact')}}</span>
                    </div>
                    <div id="content">
                        <section class="contact-section py-5">
                            <div class="container">
                                <div class="row bg-light p-4 rounded">

                                    <!-- LEFT -->
                                    <div class="col-lg-4 mb-4 mb-lg-0">
                                        <h5 class="mb-4 font-weight-bold">{{__('lang.ttll')}}</h5>

                                        <ul class="contact-info list-unstyled">
                                            <li>
                                                <i class="fas fa-phone"></i>
                                                {{$setting->phone}}
                                            </li>
                                            <li>
                                                <i class="fas fa-fax"></i>
                                                {{$setting->mst}}
                                            </li>
                                            <li>
                                                <i class="fas fa-envelope"></i>
                                                {{$setting->email}}
                                            </li>
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>
                                                {{$setting["address".$end]}}
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- RIGHT -->
                                    <div class="col-lg-8">
                                        <div class="bor-contact">
                                            <h5 class="mb-4 font-weight-bold">{{__('lang.gtn')}}</h5>
                                            <form action="{{url('/send')}}" id="contactForm" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="row-contact">
                                                            <input type="text" class="form-control" name="name"
                                                                   placeholder="{{__('lang.fullname')}}" required>
                                                            <div class="invalid-feedback">
                                                                {{__('lang.plsfullname')}}
                                                            </div>
                                                        </div>
                                                        <div class="row-contact">
                                                            <input type="email" name="email" class="form-control"
                                                                   placeholder="Email" required>
                                                            <div class="invalid-feedback">
                                                                {{__('lang.emailkhl')}}
                                                            </div>
                                                        </div>
                                                        <div class="row-contact">
                                                            <input type="tel" name="phone" class="form-control"
                                                                   placeholder="{{__('lang.sdt')}}" minlength="10" maxlength="15" required>
                                                            <div class="invalid-feedback">
                                                                {{__('lang.plssdt')}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                <textarea class="form-control" name="content" rows="5"
                                          placeholder="{{__('lang.inputcontent')}}" required></textarea>
                                                        <div class="invalid-feedback">
                                                            {{__('lang.plsinputcontent')}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <button class="btn btn-success px-4 rounded-pill" id="btn-contact" type="submit">
                                                        {{__('lang.xacnhan')}}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = this;
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }
            $('#btn-contact').prop('disabled', true);
            const formData = new FormData(form);

            fetch("{{ url('/send-ajax') }}", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    toastr.success(data.message, "Thành công");
                    form.reset();
                    $('#btn-contact').prop('disabled', false);
                })
                .catch(err => {
                    toastr.error("{{__('lang.clxr')}}", "Lỗi");
                    $('#btn-contact').prop('disabled', false);
                });
        });
    </script>
@stop
@push('js')
@endpush

