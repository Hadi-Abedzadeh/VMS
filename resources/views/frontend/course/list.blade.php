@extends('layouts.home')
@section('content')

    <div id="modal_register_in_this_course"
         class="f-12pt tac modal-box content-center display display-none position-fixed text-md-right">
        <div><h3> عنوان دوره: {{ $course_slug->title }}</h3></div>
        <hr>
        <div class="text-md-right">{{ $course_slug->buy_text }}</div>
        <hr>
        <div class="col-lg-6" style="padding: 0">
            <button id="dismiss" onclick="fade_modal()" class="btn btn-gray col-lg-5 col-xs-5">انصراف</button>
            <form action="{{ route('gateway.index') }}" method="post">
                @csrf
                <button id="register" class="btn btn-orange col-lg-6 col-xs-6">ثبت نام</button>
            </form>
        </div>

    </div>

    <main class="main-responsive">
        <div class="blog-list">
            <div class="container">
                <div class="row">
                    <section class="hero">
                        <div class="overlay"></div>
                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 offset-xl-2">
                                        <h1>
                                            <span>{{ trans('ui.text.course') }}: {{$course_slug->title}}</span>
                                        </h1>
                                        @if($course_slug->price == App\CourseSlug::FREE_PRICE OR is_null($course_slug->price))
                                            <p>{{ trans('ui.text.this_course_free') }}</p>
                                        @else
                                            <p class="text-right"> {{ trans('ui.text.this_course_price') }}
                                                @if(auth()->guest() OR !isset($user_purchases_id) OR !in_array($course_slug->id, $user_purchases_id->toArray()))
                                                    {{ number_format($course_slug->price - ($course_slug->price) * $course_slug->discount / 100) }}
                                                    {{ trans('ui.text.toman') }}
                                                @else
                                                    {{ trans('ui.text.this_course_price') }}
                                                    {{ trans('ui.text.paid') }}
                                                @endif
                                            </p>
                                        @endif

                                        @if(auth()->guest() OR !isset($user_purchases_id) OR !in_array($course_slug->id, $user_purchases_id->toArray()))
                                                <a class="cursor-pointer"
                                                   onclick="register_in_this_course({{$course_slug->id}})">{{ trans('ui.text.register_in_course') }}
                                                    <i class="md-arrow-back"></i>
                                                </a>
                                        @endif

                                        <a class="cursor-pointer"
                                           id="lets_study">{{ trans('ui.text.study_this_course') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section id="study_courses">
                        <div class="container">
                            @foreach($courses as $course)
                                <ul class="navgoco nav">
                                    <li class="active">
                                        <a>
                                            <div class="container header-lessons">
                                                <div class="col-lg-2 col-xs-3 p0"><span class="hide-in-mobile"> {{ trans('ui.text.total') }} :</span>
                                                    {{ count($course->lessons) }}
                                                    {{ trans('ui.text.lesson') }} </div>
                                                <div class="col-lg-7 hide-in-mobile tac"> {{ $course->body }}</div>
                                                <div class="col-lg-3 col-xs-9 p0"
                                                     style="text-align: right">{{$course->title}}</div>
                                            </div>
                                        </a>
                                        <ul>

                                            @if(!count($course->lessons))
                                                <li style="border-bottom: 1px solid black; padding-top: 14px; font-size: 11pt; padding-bottom: 19px;">
                                                    <div class="alert alert-danger">
                                                        {{ trans('ui.text.there_is_no_lesson_yet') }}
                                                    </div>
                                                </li>
                                            @endif
                                            @foreach($course->lessons as $lesson)
                                                <li class="{{Request::url()}}"
                                                    style="border-bottom: 1px solid black; padding-top: 14px; font-size: 11pt; padding-bottom: 19px;">
                                                    <a class="color-hovered"
                                                       href="{{ route('courses.lesson', [$course_slug->slug, $lesson->slug]) }}">
                                                        <div style="display: inline;float: right">
                                                            {{ $lesson->title }}
                                                            <i class="md-video-collection"></i>
                                                        </div>
                                                        <div
                                                            style="display: inline;">{{ $lesson->duration}} {{ trans('ui.text.minutes')}}</div>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </section>

                </div>
            </div>
        </div>


        <div class="fade-modal" onclick="fade_modal()"></div>

    </main>

    <style>


    </style>
@endsection


@section('js')
    <script>
        $("#lets_study").click(function () {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#study_courses").offset().top
            }, 1000);
        });

        function fade_modal() {
            $('.fade-modal').fadeOut(1000);
            $('#modal_register_in_this_course').slideUp(1000);
            $('.main-responsive').removeClass('make-blur');
        }

        function register_in_this_course() {
            $('#modal_register_in_this_course').slideToggle(150);
            $('.fade-modal').fadeIn(500);
            $('.main-responsive').addClass('make-blur');

        }


    </script>
@endsection
