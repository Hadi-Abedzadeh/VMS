@extends('layouts.dashboard')
@section('title', trans('ui.text.add_course'))
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">@yield('title')</h3>
        </div>
        <form role="form" action="{{route('dashboard.courses.store')}}" method="post" enctype="multipart/form-data">
            @csrf

        <!-- /.card-header -->
        <div class="card-body">
            @if ($errors->any())
                <div class="-">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <!-- text input -->
                <div class="form-group">
                    <label>عنوان دوره</label>
                    <input type="text" name="title" class="form-control" placeholder="وارد کردن عنوان دوره">
                </div>

                <div class="mb-3">
                    <textarea class="editor1" name="body" style="width: 100%"></textarea>
                </div>

                <div class="form-group">
                    <label>تصویر دوره</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- textarea -->
                <div class="form-group">
                    <label>متن هنگام خرید و معرفی دوره</label>
                    <textarea name="buy_text" class="editor1 form-control" rows="3" placeholder="وارد کردن اطلاعات ..."></textarea>
                </div>

                <!-- select -->
                <div class="form-group">
                    <label>ترم یا فصل های این دوره</label>
                    <select name="course_id[]" multiple class="form-control">
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>{{ trans('ui.text.price') }}</label>
                    <input name="price" type="text" class="form-control" placeholder="قیمت">
                </div>

                <div class="form-group">
                    <label>{{ trans('ui.text.discount') }}</label>
                    <input name="discount" type="text" class="form-control" placeholder="تخفیف">
                </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-info">{{ trans('ui.text.submit') }}</button>
            <button type="submit" class="btn btn-default float-left">{{ trans('ui.text.cancel') }}</button>
        </div>
        </form>


    </div>
@endsection

@section('js')

    <script src="/assets/dashboard/plugins/ckeditor/ckeditor.js"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor.create(document.querySelector('.editor1'))
        })
    </script>
@endsection


