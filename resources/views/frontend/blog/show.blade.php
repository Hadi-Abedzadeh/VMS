@extends('layouts.sub-layout')
@section('content')

    <main class="main-responsive">
        <div class="title-page single" style="background-image: url('{{$post->image}}')">
            <div class="top-overlay">
                <h1>{{$post->title}}</h1>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-xs-12">
                    <div class="blog-view">
                        {!! $post->body !!}
                    </div>

                    <div class="tags">
                        @foreach($post->categories as $category)
                            <a href="{{route('blog.category', $category->slug)}}">{{$category->name}}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="blog-view-newslatter">         </div>

    </main>

@endsection
