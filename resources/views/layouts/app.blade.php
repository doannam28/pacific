<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8" /><meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap Core CSS -->
    <link href="assets/home/vendor/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/home/vendor/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="assets/home/vendor/swiper.min.css" />
    <link href="assets/home/vendor/animate.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/home/vendor/jquery.mCustomScrollbar.min.css" />
    <link href="assets/home/main.css?t=214" type="text/css" rel="stylesheet" />
    <link href="assets/home/custom.css?t=214" type="text/css" rel="stylesheet" />
    <link href="/assets/css/styles.css?v={{ env('VERSION_CSS') }}" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @yield('meta')
    <link rel="canonical" href="{{ url()->current() }}" itemprop="url" />
    <?php $setting = App\Helpers\Utility::setting();?>
    <link rel="shortcut icon" href="{{Storage::disk('admin')->url($setting->favicon)}}">
    @stack('css')
</head>
<body>
<script type="text/javascript" src="assets/home/vendor/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
<script src="assets/js/jquery.show-more.js?v=3"></script>
<div class="wrap">
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</div>
<script type="text/javascript" src="assets/home/vendor/swiper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/1.1.6/waypoints.min.js"></script>
<script type="text/javascript" src="assets/home/vendor/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="assets/home/vendor/jquery.mCustomScrollbar.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="assets/home/vendor/bootstrap.min.js"></script>
<script src="assets/js/jquery.preload.min.js"></script>
<script type="text/javascript">
    var $i18n = {
        showMore: 'Xem thêm <span class="icon"><img src="assets/img-fix/chevron-down.png" alt=""></span>',
        showLess: 'Thu gọn <span class="icon"><img src="assets/img-fix/chevron-up.png" alt=""></span>',
    }
</script>
<script src="assets/js/pacific.js"></script>
</body>
</html>
