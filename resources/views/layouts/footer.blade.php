<?php $setting = App\Helpers\Utility::setting();?>
<div>
    <div class="out-footer">
        <div id="bg_head_foot"></div>
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Cột 1 -->
                        <div class="footer-col col-12 col-md-6">
                            <h4 class="footer-title">{{__('lang.htdv')}}</h4>
                            <p>{{__('lang.tvgdtm')}}</p>

                            <h5 class="company-name">{{$setting->name}}</h5>

                            <ul class="footer-info">
                                <li>
                                    <i class="fas fa-file-alt"></i>
                                    M.S.D.N: {{$setting->mst}}
                                </li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{__('lang.address')}}: {{$setting["address".$end]}}
                                </li>
                                <li>
                                    <i class="fas fa-phone"></i>
                                    Hotline:
                                    <span class="highlight">{{$setting->phone}}</span>
                                </li>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    Email:
                                    <span class="highlight">{{$setting->email}}</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Cột 2 -->
                        <div class="footer-col col-12 col-md-2">
                            <h4 class="footer-title">{{__('lang.info')}}</h4>
                            <ul class="footer-links">
                                <li>
                                    <a href="#">{{__('lang.aboutus')}}</a>
                                </li>
                                <li>
                                    <a href="#">{{__('lang.career')}}</a>
                                </li>
                                <li>
                                    <a href="#">{{__('lang.news')}}</a>
                                </li>
                                <li>
                                    <a href="#">{{__('lang.contact')}}</a>
                                </li>
                                <li>
                                    <a href="#">Video</a>
                                </li>
                            </ul>

                        </div>

                        <!-- Cột 3 -->
                        <div class="footer-col col-12 col-md-4">
                            <h4 class="footer-title">{{__('lang.nhanemail')}}</h4>
                            <p>
                                {{__('lang.txtnhanemail')}}
                            </p>
                            <form class="needs-validation subscribe-form" id="form-dk" novalidate>
                                <div class="form-group d-flex">
                                    <input
                                        id="email-dk"
                                        type="email"
                                        class="form-control"
                                        placeholder="{{ __('lang.youremail') }}"
                                        required
                                    >

                                    <button id="send-email" type="submit" class="btn btn-success ml-2">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>

                                    <div class="invalid-feedback">
                                        {{ __('lang.emailkhl') }}
                                    </div>
                                </div>
                            </form>

                            <div class="socials">
                                <a href="{{$setting->facebook}}" target="_blank" class="fb"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$setting->youtube}}" target="_blank" class="yt"><i class="fab fa-youtube"></i></a>
                                <a href="{{$setting->zalo}}" target="_blank" class="social-zalo">Zalo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="footer-bottom">
                Copyright © 2025 bancaygiong.com.vn
            </div>
            <!-- Back to top -->
            <a href="#" class="back-to-top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </footer>
    </div>
</div>
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            var forms = document.getElementsByClassName('needs-validation');

            Array.prototype.forEach.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
