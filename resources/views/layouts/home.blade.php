<!DOCTYPE html>
<html lang="fa-IR">
<head>
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{trans('ui.text.site')}} - {{ env('APP_NAME') }}</title>
    <meta name="google-site-verification" content="{{config('settings.google-site-verification')}}"/>
    <link href="{{ config('settings.favicon') }}" rel="shortcut icon">

    @foreach(config('settings.apple-touch-icon') as $key => $value)
        <link rel="apple-touch-icon" sizes="{{$key}}" href="{{ $value }}"/>
    @endforeach

    <link rel="manifest" href="{{config('settings.manifest')}}">

    @foreach(config('settings.og') as $key => $value)
        <meta property="og:{{$key}}" content="{{$value}}">
    @endforeach

    <script>var Kavimo = Kavimo || {
            "status": {"env": "prod", "debug": 0, "version": "1.0"},
            "url": {
                "base": "https:\/\/kavimo.com\/",
                "static": "https:\/\/statics.kavimo.com",
                "jsDirectory": "https:\/\/statics.kavimo.com\/js"
            },
            "datetime": {
                "pack": "Sun Oct 20 2019 12:34:03 +0330",
                "year": "\u06f1\u06f3\u06f9\u06f8",
                "month": "\u06f0\u06f7",
                "month_string": "\u0645\u0647\u0631",
                "day": "\u06f2\u06f8"
            }
        }</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="{{ config('settings.description') }}">
    <meta name="keywords" content="{{config('settings.keywords')}}">


    <link href="/assets/statics/css/site.css" rel="stylesheet">

    @yield('css')
</head>
<body>
<noscript>
    <div class="noscript">
        <i class="md-warning"></i>{{trans('ui.text.please_enable_javascript')}}<br>
        <a href="/site/index">{{trans('ui.text.reload_again')}}</a>
    </div>
</noscript>

<div class="wrap">

    <header>
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-5 col-xs-4">
                    <div class="account">

                        @if(auth()->user())
                            <a class="signup" href="{{route('mylogout')}}">{{trans('ui.auth.logout')}}<i class="md-arrow-back"></i></a>
                        @else
                            <a class="signup" href="{{route('login')}}">{{trans('ui.auth.login')}}<i class="md-person"></i></a>
                        @endif

                        <a class="login" href="tel:{{trans('ui.general.digit_tel')}}">{{trans('ui.general.digit_tel')}}<i class="md-call icon"></i></a>

                    </div>
                </div>
                <div class="col-xl-6 push-xl-0 col-lg-7 push-lg-0 col-md-5 push-md-2 col-xs-4 push-xs-4">
                    <span class="button-menu show hidden-md-up"><i class="md-menu"></i></span>
                    <div class="menu">
                        <div class="user-links show hidden-md-up">

                            @if(auth()->user())
                                <a class="signup" href="{{route('mylogout')}}">{{trans('ui.auth.logout')}}<i class="md-arrow-back"></i></a>
                            @else
                                <a class="signup" href="{{route('login')}}">{{trans('ui.auth.login')}}<i class="md-person"></i></a>
                            @endif

                            <a class="login" href="tel:{{trans('ui.general.digit_tel')}}">{{trans('ui.general.digit_tel')}}<i class="md-call icon"></i></a>
                        </div>

                        <div class="title-sm">
                            <span>{{trans('ui.text.main_page')}} <i class="md-menu"></i><i class="md-keyboard-arrow-down arrow"></i></span>
                        </div>
                        <a class="{{(Request::is('/') == '/')? 'active' : '' }}" href="/">{{trans('ui.text.main_page')}} <i class="md-home show hidden-sm-up"></i></a>
                        <a class="{{(Request::is('courses*') == route('courses.index'))? 'active' : '' }}" href="{{route('courses.index')}}">{{trans('ui.text.courses')}}<i class="md-wallet-membership show hidden-sm-up"></i></a>
                        <a class="{{(Request::is('blog*') == route('blog.index'))? 'active' : '' }}" href="{{route('blog.index')}}">{{trans('ui.text.blog')}}<i class="md-public show hidden-sm-up"></i></a>
                        <a href="/resources">{{ trans('ui.text.resources') }}<i class="md-school show hidden-sm-up"></i></a>
                        <a href="/contact">{{trans('ui.text.contact_us')}}<i class="md-call show hidden-sm-up"></i></a>
                        @if(auth()->user())
                            <a href="{{ route('clientarea.index') }}">{{trans('ui.text.clientarea')}}<i class="md-call show hidden-sm-up"></i></a>
                        @endif

                    </div>
                </div>
                <div class="col-xl-3 pull-xl-0 col-lg-2 pull-lg-0 col-md-2 pull-md-5 col-xs-4 pull-xs-4">
                    <a class="brand" href="/"></a>
                </div>
            </div>
        </div>
        <div class="overlay-responsive"></div>
    </header>

{{--    <!-- <div class="popup-ads">--}}
{{--	<div class="shadow"></div>--}}
{{--	<div class="box-popup">--}}
{{--		<div class="title">--}}
{{--			<h4>کارگاه آموزشی ویدیو مارکتینگ</h4>--}}
{{--			<span class="close"><img src="https://statics.kavimo.com/img/public/close.png" alt=""></span>--}}
{{--		</div>--}}
{{--		<div class="body">--}}
{{--			<a href="https://evand.com/events/video-marketing-co" target="_blank"><img src="https://statics.kavimo.com/img/public/video-marketing-workshop.png" alt="video-marketing-workshop"></a>--}}
{{--		</div>--}}

{{--		<div class="footer">--}}
{{--			<a href="https://evand.com/events/video-marketing-co" target="_blank">برای کسب اطلاعات بیشتر و ثبت نام کلیک کنید</a>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</div> -->--}}
{{--    --}}

    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a class="brand" href="/"></a>
                    <div class="links">
                        <a class="active" href="/">{{trans('ui.text.main_page')}}</a>
                        <a href="{{route('courses.index')}}">{{trans('ui.text.courses')}}</a>
                        <a href="/help">{{trans('ui.text.help')}}</a>
                        <a href="/page/roles">{{trans('ui.text.roles')}}</a>
                        <a href="/job">{{trans('ui.text.hire')}}</a>
                        <a href="/contact">{{trans('ui.text.contact_us')}}</a>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="copyright">
                        <p>{{trans('ui.general.copyright_text')}}</p>
                    </div>
                </div>

            </div>
        </div>
    </footer>
</div>
<a id="scrollTop"></a>

</body>
<script src="/assets/statics/js/jquery.min.js"></script>
<script src="/assets/statics/js/yii.js"></script>
<script src="/assets/statics/js/core.js"></script>
<script src="/assets/statics/js/site.js"></script>

<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="/assets/navgoco/src/jquery.cookie.js"></script>
<script type="text/javascript" src="/assets/navgoco/src/jquery.navgoco.js"></script>
<link rel="stylesheet" href="/assets/navgoco/src/jquery.navgoco.css" type="text/css" media="screen" />

<link href="/assets/statics/css/rangeslider.css" rel="stylesheet"></head>
<script src="/assets/statics/js/rangeslider.min.js"></script>

@yield('js')


</html>

