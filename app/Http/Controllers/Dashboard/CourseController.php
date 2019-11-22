<?php

namespace App\Http\Controllers\Dashboard;

use App\Course;
use App\CourseSlug;
use App\Http\Controllers\Controller;
use App\Lesson;
use Illuminate\Http\Request;
use \getID3;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = CourseSlug::orderBy('id', 'DESC')->paginate(CourseSlug::PAGINATE_COUNT);
        return view('dashboard.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courses = Course::orderBy('id', 'desc')->get();
        return view('dashboard.course.create', compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|max:191',
            'body'      => 'required',
            'buy_text'  => 'required',
            'course_id' => 'required',
            'price'     => 'required',
            'discount'  => 'nullable',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $image = $request->file('image');
        $image_name = md5(time()).'.'.$image->getClientOriginalExtension();

        $order = CourseSlug::select('order')->max('order');
        $image->move(public_path().CourseSlug::imageStoragePath, $image_name);
        $course_slug = new CourseSlug;

        $course_slug->title     = $request->input('title');
        $course_slug->body      = $request->input('body');
        $course_slug->image     = $image_name;

        $course_slug->buy_text  = $request->input('buy_text');
        $course_slug->course_id = implode(',', $request->input('course_id')).',';
        $course_slug->price     = $request->input('price');
        if($request->input('discount')) {
            $course_slug->discount = $request->input('discount');
        }
        $course_slug->order     = $order+1;

        if($course_slug->save()){
            $messages = trans('ui.messages.record_add_success');
        }else{
            $messages = trans('ui.messages.record_add_failed');
        }
        return redirect()->back()->withErrors([$messages]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function detail($id)
    {
        $lessons = Lesson::orderBy('id', 'desc')->get();
        return view('dashboard.course.detail', compact('lessons', 'id'));
    }

    public function courseLesson(Request $request, $id)
    {
        $course = Course::find($id);
        $course->lessons()->sync($request->lessons);
        return $request->all();
    }

    public function upload()
    {
        $courses = Course::orderBy('order', 'desc')->get();
        return view('dashboard.course.upload', compact('courses'));
    }

    public function upload_store(Request $request){

        return implode(',', $request->input('lessons')).',';

        $request->validate([
            'course_id' => 'integer',
            'title'     => 'required|max:191',
            'body'      => 'required',
            'thumbnail' => 'nullable',
            'video'     => 'required|mimes:mp4',
        ]);

        $video = $request->file('video');

        $video_name = md5(time()).'.'.$video->getClientOriginalExtension();

        $video_path = public_path().CourseSlug::videoStoragePath.$request->input('course_id').'/';
        $video->move($video_path, $video_name);

        $getID3 = new getID3;

        $video_file = $getID3->analyze($video_path.$video_name);

        $lesson           = new Lesson;
        $lesson->title    = $request->input('title');
        $lesson->body     = $request->input('body');
        $lesson->video    = $video_name;
        $lesson->duration = $video_file['playtime_string'];

        if($request->input('thumbnail'))
            $lesson->thumbnail = $request->input('thumbnail');

        if($lesson->save()){
            return 'ggggggggggggggg';
        }
    }

}
