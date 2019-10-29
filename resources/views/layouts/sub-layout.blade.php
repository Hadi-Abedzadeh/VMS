<!DOCTYPE html>
<html lang="fa-IR">
<head>
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{trans('ui.text.blog')}} - {{ env('APP_NAME') }}</title>
    <meta name="google-site-verification" content="{{config('settings.google-site-verification')}}"/>
    <link href="{{ config('settings.favicon') }}" rel="shortcut icon">

    @foreach(config('settings.apple-touch-icon') as $key => $value)
        <link rel="apple-touch-icon" sizes="{{$key}}" href="{{ $value }}"/>
    @endforeach

    <link rel="manifest" href="{{config('settings.manifest')}}">
    <meta property="og:site_name" content="{{env('APP_NAME')}}">

    <script>var Kavimo = Kavimo || {
            "status": {"env": "prod", "debug": 0, "version": "1.0"},
            "url": {
                "base": "https:\/\/kavimo.com\/",
                "static": "https:\/\/statics.kavimo.com",
                "jsDirectory": "https:\/\/statics.kavimo.com\/js"
            },
            "datetime": {
                "pack": "Sun Oct 20 2019 13:39:17 +0330",
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
    <link href="/assets/statics/css/blog.css" rel="stylesheet">
</head>
<body>
<noscript>
    <div class="noscript">
        <i class="md-warning"></i>
        {{ trans('ui.text.please_enable_javascript') }}
        <br><a href="{{ route('blog.index') }}">{{ trans('ui.text.reload_again') }}</a>
    </div>
</noscript>

<header>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-5 col-xs-4">
                <div class="account">
                    @if(auth()->user())
                        <a class="signup" href="{{route('mylogout')}}">{{trans('ui.auth.logout')}}<i class="md-arrow-back"></i></a>
                        <a class="signup" href="{{ route('clientarea.index') }}">{{ trans('ui.text.clientarea') }}</a>
                    @else
                        <a class="signup" href="{{route('login')}}">{{trans('ui.auth.login')}}<i class="md-person"></i></a>
                    @endif

                    <a class="login" href="tel:{{trans('ui.general.digit_tel')}}">{{to_persian(trans('ui.general.digit_tel'))}}<i class="md-call icon"></i></a>
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

                            <a class="login" href="tel:{{trans('ui.general.digit_tel')}}">{{ to_persian(trans('ui.general.digit_tel')) }}<i class="md-call icon"></i></a>
                    </div>

                    <div class="title-sm">
                        <span>{{ trans('ui.text.main_menu') }}<i class="md-menu"></i><i class="md-keyboard-arrow-down arrow"></i></span>
                    </div>


                    <a href="/"> {{trans('ui.text.main_page')}} <i class="md-home show hidden-sm-up"></i></a>
                    <a class="{{(Request::is('courses*') == route('courses.index'))? 'active' : '' }}" href="{{route('courses.index')}}">{{trans('ui.text.courses')}} <i class="md-wallet-membership show hidden-sm-up"></i></a>
                    <a href="/help">{{trans('ui.text.help')}} <i class="md-help show hidden-sm-up"></i></a>
                    <a class="{{(Request::is('blog*') == route('blog.index'))? 'active' : '' }}" href="{{route('blog.index')}}">{{trans('ui.text.blog')}}<i class="md-public show hidden-sm-up"></i></a>
                    <a href="/resources"> {{trans('ui.text.resources')}}<i class="md-school show hidden-sm-up"></i></a>
                    <a href="/contact">{{trans('ui.text.contact_us')}}<i class="md-call show hidden-sm-up"></i></a>
                </div>
            </div>
            <div class="col-xl-3 pull-xl-0 col-lg-2 pull-lg-0 col-md-2 pull-md-5 col-xs-4 pull-xs-4">
                <a class="brand" href="/"></a>
            </div>
        </div>
    </div>
    <div class="overlay-responsive"></div>
</header>

@yield('content')


<footer class=white>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a class="brand" href="/"></a>
                <div class="links">
                    <a class="{{(Request::is('/') == '/')? 'active' : '' }}" href="/">{{trans('ui.text.main_page')}}</a>
                    <a class="{{(Request::is('courses*') == route('courses.index'))? 'active' : '' }}" href="{{route('courses.index')}}">{{trans('ui.text.courses')}}</a>
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
</body>

<script src="/assets/statics/js/jquery.min.js"></script>
<script src="/assets/statics/js/yii.js"></script>
<script src="/assets/statics/js/core.js"></script>
<script src="/assets/statics/js/blog.js"></script>

<link href="/assets/statics/css/rangeslider.css" rel="stylesheet"></head>
<script src="/assets/statics/js/rangeslider.min.js"></script>

@yield('js')
</html>
