<?php

if (!function_exists('to_english')) {
    function to_english($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];

        $num = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return $englishNumbersOnly = str_replace($arabic, $num, str_replace($persian, $num, $string));
    }
}

if (!function_exists('to_persian')) {
    function to_persian($string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

        $num = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return $convertedPersianNums = str_replace($num, $persian, $string);

    }
}

if (!function_exists('create_video_tag')) {
    function create_video_tag($video)
    {
        return "<div style='margin: 0 auto;'>
                <video style='text-align: center' width='".App\Lesson::VIDEO_SIZE_WIDTH." }}' height='".App\Lesson::VIDEO_SIZE_HEIGHT."' controls>
                    <source src='{$video}' type='video/mp4'>
                        " . trans('ui.general.browser_doest_support_video') . "
                </video>
            </div>";
    }
}
if (!function_exists('create_course_description')) {
    function create_course_description($body)
    {
        return "<div>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='card-header'>
                        <h3 class='card-title'>
                            " . trans('ui.text.course_description') . "
                        </h3>
                    </div>
                    <div class='card-body'>
                        {$body}
                    </div>
                </div>
            </div>
        </div>";
    }
}
if (!function_exists('course_not_accessible')) {
    function course_not_accessible()
    {
        return "<div class='alert alert-danger'>
        " . trans('ui.general.course_not_accessible') . "
               </div>";
    }
}
