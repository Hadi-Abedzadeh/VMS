@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">جدول داده ۱</h3>
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
                                    ترم های این درس
                                </th>
                                <th>
                                    عملیات
                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($terms as $term)
                                <tr role="row" class="odd">
                                    <td>{{$loop->iteration}}</td>
                                    <td><img width="80px" src="{{ $term->image }}"></td>
                                    <td>{{ $term->title }}</td>
                                    <td>

                                        @foreach($term->lessons as $lesson)
                                            <div  class="badge bg-primary"> {{ $lesson->title }} </div>
                                        @endforeach

                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.courses.detail', $term->id) }}"> <i class="fa fa-edit"></i> </a>

                                    </td>
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
                            {{ $terms->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
