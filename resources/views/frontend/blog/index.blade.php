@extends('layouts.sub-layout')@section('content')
    <main class="main-responsive">
        <div class="title-page">
            <div class="container">
                <div class="row">
                    <h1>{{ trans('ui.text.blog') }}</h1>
                    <p>{{ trans('ui.text.blog_text') }}</p>
                </div>
            </div>
        </div>

        <div class="blog-list">
            <div class="container">
                <div class="row">

                    @foreach($posts as $post)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="blog-item">
                                    <div class="thumbnail" style="background-image: url('{{ $post->image }}')"></div>
                                <a href="{{ route('blog.show', $post->slug) }}">{{$post->title}}</a>
                                <div class="footer-item">
                                    <div class="col-xl-4 col-xs-6">
                                        <a href="{{ route('blog.show', $post->slug)}}">{{ trans('ui.text.read_more') }}</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-xl-12 col-xs-12">
                        {{ $posts->links() }}
{{--                        <ul class="pagination">--}}
{{--                            <li class="prev"><a href="/blog/index?page=1" data-page="0"><i class="md-arrow-back"></i></a>                            </li>--}}
{{--                            <li><a href="/blog/index?page=1" data-page="0">1</a></li>--}}
{{--                            <li class="active"><a href="/blog/index?page=2" data-page="1">2</a></li>--}}
{{--                            <li><a href="/blog/index?page=3" data-page="2">3</a></li>--}}
{{--                            <li><a href="/blog/index?page=4" data-page="3">4</a></li>--}}
{{--                            <li><a href="/blog/index?page=5" data-page="4">5</a></li>--}}
{{--                            <li><a href="/blog/index?page=6" data-page="5">6</a></li>--}}
{{--                            <li class="next"><a href="/blog/index?page=3" data-page="2"><i class="md-arrow-forward"></i></a>                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </main>

    @endsection
