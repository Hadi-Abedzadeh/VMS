@extends('layouts.home')
@section('content')
    <main>
        <section class="hero">
            <div class="overlay"></div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 offset-xl-2">
                            <h1><span>کاویمو، </span> پلتفرم میزبانی ویدیو با ویژگی‌های منحصربه‌فرد</h1>
                            <p>اولین سرویس میزبانی ویدیو برای صاحبان کسب‌وکار آنلاین</p>
                            <a href="/pricing">از اینجا شروع کنید<i class="md-arrow-back"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="connect"></div>
            <div class="inner-features">
                <div class="container">
                    @foreach ($facilities->chunk(App\Facility::CHUNK) as $chunk)
                        <div class="row">
                            @foreach ($chunk as $facility)
                                <div class="{{ App\Facility::COL_SIZE }}">
                                    <div class="item">
                                        <img src="{{ $facility->image }}" alt="{{$facility->title}}">
                                        <h3>{{$facility->title}}</h3>
                                        <p>{{ $facility->body }}</p>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    @endforeach

                </div>
            </div>
        </section>


        <section class="articles">
            <h2>{{ trans('ui.text.course_text_title') }}</h2>
            <p>{{ trans('ui.text.course_text_description') }}</p>

            <div class="list-articles">
                <div class="container">
                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="article-box">
                                    <div class="thumbnail" style="background-image: url('{{$course->image}}')"></div>
                                    <div class="content">
                                        <a class="title" href="{{route('courses.list', $course->slug)}}">{{ $course->title }}</a>
                                        <div class="down">
                                            <a href="{{ route('courses.list', $course->slug) }}">{{trans('ui.text.enter_course')}}<i class="md-keyboard-arrow-left"></i></a>
                                        </div>
                                        <div class="badge bg-danger">
                                            <small>
                                                {{ trans('ui.text.this_course_price') }}
                                                {{ (number_format($course->price - ($course->price) * $course->discount / 100)) }}
                                                {{ trans('ui.text.toman') }}
                                            </small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        @if(!auth()->guest())
        <section class="articles" style="background: #F16334">
            @if(count($user_purchases) > 0)
                <h2>{{ trans('ui.course.your_purchase_course') }}</h2>
            @else
                <h2>{{ trans('ui.course.you_have_not_purchase_yet') }}</h2>
            @endif
            <br>
            <div class="list-articles">
                <div class="container">
                    <div class="row">
                        @foreach($user_purchases as $user_purchase)
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="article-box">
                                    <div class="thumbnail" style="background-image: url('{{$user_purchase->image}}')"></div>
                                    <div class="content">
                                        <a class="title" href="{{route('courses.list', $user_purchase->slug)}}">{{ $user_purchase->title }}</a>
                                        <div class="down">
                                            <a href="{{ route('courses.list', $user_purchase->slug) }}">{{trans('ui.text.enter_course')}}<i class="md-keyboard-arrow-left"></i></a>
                                        </div>
                                        <div class="badge bg-danger">
                                            <small class="text-green">
                                                 {{ trans('ui.text.paid') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section class="articles">
            <h2>{{ trans('ui.blog.latest') }}</h2>
            <p>{{ trans('ui.blog.latest_text') }}</p>

            <div class="list-articles">
                <div class="container">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="article-box">
                                    <div class="thumbnail"
                                         style="background-image: url('{{$post->image}}')"></div>

                                    <div class="content">
                                        <a class="title" href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                        <div class="down">
                                            <a href="{{ route('blog.show', $post->slug) }}">{{trans('ui.text.read_more')}}<i class="md-keyboard-arrow-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </section>



        <section class="finish">
            <div class="connect"></div>
        </section>
    </main>
@endsection

