@extends('layouts.sub-layout')
@section('content')
    <main class="main-responsive">

        <div class="blog-view">
            <div class="container-fluid">
                <div class="col-lg-9">
                    <div class="container-fluid">

                        <h2>{{ $lesson->title }}
                            @if(!isset($user_purchases_id))
                                {{ ($lesson->free) ? '('.trans('ui.text.free').')' : '' }}
                            @endif
                        </h2>

                        <hr>
                            @if(isset($user_purchases_id) AND in_array($course_slug->id, $user_purchases_id->toArray()))
                                {!! ($lesson->video_tag) ? $lesson->video : create_video_tag($lesson->video) !!}
                                {!! create_course_description($lesson->body) !!}
                            @elseif($lesson->free == App\CourseSlug::COURSE_FREE)
                                {!! ($lesson->video_tag) ? $lesson->video : create_video_tag($lesson->video) !!}
                                {!! create_course_description($lesson->body) !!}
                            @else
                                {!! course_not_accessible() !!}
                            @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <h1>{{ $course_slug->title }}</h1>
                    @foreach($courses as $course)
                        <ul class="navgoco nav">
                            <li class="active">
                                <a>
                                    <div class="header-lessons p-t-0">
                                        <div class="col-lg-6" style="text-align: left"> {{ trans('ui.text.total') }}
                                            : {{ count($course->lessons) }} {{ trans('ui.text.lesson') }} </div>
                                        <div class="col-lg-6" style="text-align: right">
                                            {{$course->title}}
                                        </div>
                                    </div>
                                </a>
                                <ul>
                                    @if(!count($course->lessons))
                                        <li style="border-bottom: 1px solid black; padding-top: 14px; font-size: 11pt; padding-bottom: 19px;">
                                            <div class="alert alert-danger"> {{ trans('ui.text.there_is_no_lesson_yet') }} </div>
                                        </li>
                                    @endif

                                    @foreach($course->lessons as $lesson)
                                        <li class="{{ ((Request::segment(3) ==  $course_slug->slug) AND (Request::segment(4) == $lesson->slug)) ? 'playing-now' : ''}}"
                                            style="border-bottom: 1px solid black; padding-top: 14px; font-size: 11pt; padding-bottom: 19px;">
                                            <a class="color-hovered" href="{{ route('courses.lesson', [$course_slug->slug, $lesson->slug]) }}">
                                                <div style="display: inline">
                                                    <i class="md-video-collection"></i>
                                                    {{ $lesson->title }}
                                                    @if($lesson->free == App\CourseSlug::COURSE_FREE)
                                                        <span class="lesson-free">{{ trans('ui.text.free') }}</span>
                                                    @endif
                                                </div>
                                                <div style="display: inline; float: left">{{ $lesson->duration }} {{ trans('ui.text.minutes')}}</div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="blog-view-newslatter"></div>
    </main>

@endsection
