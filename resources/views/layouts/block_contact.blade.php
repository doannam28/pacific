<section class="cta-support">
    <div class="container">
        <div class="cta-grid">
            <!-- Left content -->
            <div class="cta-left">
                <h3>{{__('lang.bctv')}}</h3>
                <p>{{__('lang.hlhn')}}</p>

                <div class="cta-socials">
                    <a href="{{$setting->facebook}}" target="_blank" class="fb"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{$setting->youtube}}" target="_blank" class="gp"><i class="fab fa-youtube"></i></a>
                    <a href="{{$setting->zalo}}" target="_blank" class="social-zalo">Zalo</a>
                </div>
            </div>

            <!-- Right content -->
            <div class="cta-right row">
                <div class="col-6">
                    <span class="cta-label">{{__('lang.htkh')}}</span>
                    <a href="tel:{{$setting->phone}}" class="cta-phone">
                        <i class="fas fa-phone-alt"></i>
                        {{$setting->phone}}
                    </a>
                </div>
                <div class="col-6">
                    <a href="tel:{{$setting->phone}}" class="cta-btn">{{__('lang.callnow')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container my-5">
        <div class="row">

            <!-- LEFT -->
            <div class="col-md-6">
                <h5 class="contact-title">{{__('lang.viewmap')}}</h5>

                <div class="map-box mb-3">
                    <!-- Google Map -->
                    <iframe
                        src="{{$content->googlemap}}">
                    </iframe>
                </div>

                <div class="company-name">
                    {{$setting->name}}
                </div>

                <div class="rating mb-1">
                    ★★★★★
                </div>

                <div class="text-muted">
                    <i class="fas fa-map-marker-alt"></i> {{__('lang.address')}}: {{$setting["address".$end]}}
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-md-6">
                <h5 class="contact-title">{{__('lang.gyccct')}}</h5>
                <form class="needs-validation form-contact" novalidate id="contactForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control"
                               placeholder="{{__('lang.fullname')}}" name="name" required>
                        <div class="invalid-feedback">
                            {{__('lang.plsfullname')}}
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" name="email"
                               placeholder="Email" required>
                        <div class="invalid-feedback">
                            {{__('lang.emailkhl')}}
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="tel" class="form-control" name="phone"
                               placeholder="{{__('lang.sdt')}}" minlength="10" maxlength="15" required>
                        <div class="invalid-feedback">
                            {{__('lang.plssdt')}}
                        </div>
                    </div>

                    <div class="form-group">
                    <textarea class="form-control"
                              rows="4"
                              name="content"
                              placeholder="{{__('lang.inputcontent')}}"
                              required></textarea>
                        <div class="invalid-feedback">
                            {{__('lang.plsinputcontent')}}
                        </div>
                    </div>

                    <button type="submit" id="btn-contact" class="btn btn-submit text-white">
                        {{__('lang.guidi')}}
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>
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
