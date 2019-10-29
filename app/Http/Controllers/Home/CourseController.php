<?php

namespace App\Http\Controllers\Home;

use App\Course;
use App\CourseLesson;
use App\CourseSlug;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{

    public function index()
    {
        $courses = CourseSlug::orderBy('id', 'DESC')->get();
        return view('frontend.course.index', compact('courses'));
    }

    public function list($course_slug)
    {
        $course_slug = CourseSlug::where('slug', $course_slug)->first();

        if(!auth()->guest()) {
            $user_purchases_id = $this->user_purchases_id();
        }

        if ($course_slug) {
            $course_id = $course_slug->course_id;
            $course_id = explode(',', $course_id);

            $courses = Course::with('lessons')->whereIn('id', $course_id)->get();
            return view('frontend.course.list', compact('courses', 'course_slug', 'user_purchases_id'));
        } else {
            return abort(404);
        }
    }

    public function lesson(CourseSlug $course_slug, Lesson $lesson)
    {

        if(!auth()->guest()) {
            $user_purchases_id = $this->user_purchases_id();
        }

        $course_id = $course_slug->course_id;
        $course_id = explode(',', $course_id);

        $courses = Course::with('lessons')->whereIn('id', $course_id)->get();

        return view('frontend.course.lesson', compact('course_slug', 'courses', 'lesson', 'user_purchases_id'));

    }

}
