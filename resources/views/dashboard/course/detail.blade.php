@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <form action="{{ route('dashboard.courses.course-lesson', $id) }}" method="post">
            @csrf

        <div class="card-header ui-sortable-handle" style="cursor: move;">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                لیست کارها
            </h3>

            <div class="form-group">
                    <label>چند انتخابی</label>
                    <select name="lessons[]" multiple class="form-control">
                        @foreach($lessons as $lesson)
                            <option value="{{$lesson->id}}">{{ $lesson->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-info float-right"><i class="fa fa-plus"></i> جدید</button>
                </div>


        </div>
        <!-- /.card-header -->
{{--        <div class="card-body">--}}
{{--            <ul class=" ui-sortable" id="sortable">--}}
{{--                @foreach($lessons as $lesson)--}}
{{--                    <li id="lesson-{{$lesson->id}}">{{ $lesson->title }}</li>--}}
{{--                 @endforeach--}}
{{--            </ul>--}}
{{--            Query string: <span></span>--}}
{{--        </div>--}}
        <!-- /.card-body -->

        </form>

    </div>

@endsection

@section('js')

    <script>
        $(document).ready(function () {
            $('#sortable').sortable({
                axis: 'y',
                stop: function (event, ui) {
                    $.ajax({
                        data: $(this).sortable('serialize')+"&_token={{ csrf_token() }}",
                        type: 'POST',
                        url: '{{ route('dashboard.courses.upload_store') }}'
                    });
                }
            });
        });
    </script>
@endsection
