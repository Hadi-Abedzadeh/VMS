@extends('layouts.dashboard')
@section('title', trans('ui.text.blog'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th>
                                    #
                                </th>
                                <th>
                                    تصویر
                                </th>
                                <th>
                                    عنوان
                                </th>
                                <th>
                                    تاریخ ایجاد
                                </th>
                                <th>
                                    عملیات
                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($posts as $post)
                                <tr role="row" class="odd">
                                    <td>{{$loop->iteration}}</td>
                                    <td><img width="80px" src="{{ $post->image }}"></td>
                                    <td>{{ ($post->title) }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>-</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5"></div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
