<?php

namespace App\Http\Controllers\Home;

use App\Course;
use App\CourseSlug;
use App\Facility;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\UserPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $posts      = Post::orderBy('published_at', 'DESC')->limit(4)->get();
        $facilities = Facility::orderBy('order', 'ASC')->get();
        $courses    = CourseSlug::orderBy('order', 'DESC')->get();

        if(!Auth::guest()) {
            $user_purchases_id = $this->user_purchases_id();

            $user_purchases = CourseSlug::whereIn('id', $user_purchases_id)->get();
        }


        return view('frontend.index', compact('posts', 'facilities', 'courses', 'user_purchases_id', 'user_purchases'));
    }



    public function clientarea()
    {
        $user = User::find(Auth::id());
        $user_purchases = UserPurchase::with('courses')->where('user_id', $user->id)->get();

        return view('frontend.clientarea.index', compact('user_purchases'));
    }

}
