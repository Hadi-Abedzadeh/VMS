@extends('layouts.dashboard')
@section('title', trans('ui.text.courses'))
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
                                    ترم های این درس
                                </th>
                                <th>
                                    عملیات
                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($courses as $course)
                                <tr role="row" class="odd">
                                    <td>1</td>
                                    <td><img width="80px" src="{{ $course->image }}"></td>
                                    <td>{{ to_persian($course->title) }}</td>
                                    <td>
                                        @php
                                            $course_id = $course->course_id;
                                            $course_id = explode(',', $course_id);
                                            $courses_slug = App\Course::with('lessons')->whereIn('id', $course_id)->get();
                                        @endphp
                                        @foreach($courses_slug as $course_id)
                                            <div  class="badge bg-primary"> {{ $course_id->title }} </div>
                                        @endforeach

                                    </td>
                                    <td>
                                        <a href="{{ route('dashboard.courses.detail', $course->course_id) }}"> <i class="fa fa-edit"></i> </a>

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
                            {{ $courses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
