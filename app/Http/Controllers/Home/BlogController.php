<?php

namespace App\Http\Controllers\Home;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('published_at', 'DESC')->paginate(2);

        return view('frontend.blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('frontend.blog.show', compact('post'));
    }

    public function category(Category $category)
    {
        $categories = Category::with('posts')->where('slug', $category->slug)->get();
        return view('frontend.blog.category', compact('categories'));

    }
}
