
<!DOCTYPE html>
<html lang="fa-IR">
<head>
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="Yb6AR_5pcszIB-Sk-JvO9DRRrbcAqDegu-MnAUh4rSpMjvgrjAwqiIBEjemcooeHQjrI0DHHdO7z1hRxJU_5Zg==">
    <title>کاویمو | ورود</title>
    <meta name="google-site-verification" content="M3LKIcgRUH_GwOw2tRXL1WZ7eOTTvTmeExwHoLONGN8" />
    <link href="https://statics.kavimo.com/favicon.png" rel="shortcut icon">
    <link rel="apple-touch-icon" sizes="60x60" href="https://statics.kavimo.com/img/apple-icons/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="https://statics.kavimo.com/img/apple-icons/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="https://statics.kavimo.com/img/apple-icons/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="https://statics.kavimo.com/img/apple-icons/apple-icon-152x152.png" />
    <link rel="manifest" href="https://statics.kavimo.com/favicon/manifest.json">
    <meta property="og:site_name" content="Kavimo">
    <script>var Kavimo = Kavimo || {"status":{"env":"prod","debug":0,"version":"1.0"},"url":{"base":"https:\/\/app.kavimo.com\/","static":"https:\/\/statics.kavimo.com","jsDirectory":"https:\/\/statics.kavimo.com\/js"},"datetime":{"pack":"Wed Oct 23 2019 22:37:41 +0330","year":"\u06f1\u06f3\u06f9\u06f8","month":"\u06f0\u06f8","month_string":"\u0622\u0628\u0627\u0646","day":"\u06f0\u06f1"}}</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="description_login">
    <meta property="og:image" content="https://statics.kavimo.com/img/public/share-thumnail.jpg">
    <link href="https://statics.kavimo.com/css/bin/account.css?v=1568502742" rel="stylesheet"></head>
<body>
<noscript><div class="noscript"><i class="md-warning"></i>لطفا جاوا اسکریپت مرورگر خود را فعال کنید<br><a href="https://app.kavimo.com/auth">بارگزاری مجدد</a></div></noscript>
<div class="wrap">
    <div class="right-bar">
        <div class="inner top">
        </div>
        <a class="brand" href="/"></a>
        <div class="inner bottom">
            <a class="navigations home" href="/"><span>بازگشت به </span>صفحه اصلی<i class="md-home"></i><i class="md-arrow-forward arrow"></i></a>	</div>
    </div>
    <div class="left-bar login">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="box-form">
                        <div class="title-box">
                            <h1>به کاویمو خوش‌آمدید</h1>
                            <p>برای ورود فیلد های زیر را تکمیل نمایید</p>
                        </div>
                        <form class="form" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="col-xl-12 message hide"><div class="warning"><i class="md-error"></i><span></span></div></div>

                            <div class="section-form">
                                <div class="col-xl-12">
                                    <div class="wrapfield hasIcon" id="mobile-input">
                                        <div class="form-group field-loginform-username">
                                            <input type="email" placeholder="{{trans('ui.auth.email')}}" name="email" class="form-control @error('email') is-invalid @enderror" dir="ltr" style="direction: ltr; padding-bottom: 12px;" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>
                                        <i class="md-smartphone icon"></i>
                                    </div>
                                    <br>
                                    <div class="wrapfield hasIcon" id="mobile-input">
                                        <div class="form-group field-loginform-username">
                                            <input type="password" placeholder="{{ trans('ui.auth.password') }}" class="form-control @error('password') is-invalid @enderror" name="password" dir="ltr" style="direction: ltr;padding-bottom: 12px;" required autocomplete="current-password" >

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <i class="md-smartphone icon"></i>
                                    </div>


                                </div>
                            </div>
                            <div class="section-form">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-12 col-xs-12">
                                            <button type="submit" tabindex="4">{{trans('ui.auth.login')}}</button>									</div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
</body>
<script src="https://assets.kavimo.com/c3d77c13/jquery.min.js?v=1567982534"></script>
<script src="https://assets.kavimo.com/512864f3/yii.js?v=1567982534"></script>
<script src="https://statics.kavimo.com/js/vendor/core.js"></script>
<script src="https://statics.kavimo.com/js/bin/account.js?v=1569868845"></script>
<script>jQuery(function ($) {
        Kavimo.modules.account.loginModule.init();
    });</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://statics.kavimo.com/js/analytics.js','ga');
    // })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-98404079-1', 'auto');
    ga('send', 'pageview');
</script>
</html>

