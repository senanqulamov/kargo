<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::where('status', 1)->orderBy('created_at','desc')->get();
        return view('frontend.blogs', compact('blogs'));
    }

    public function detail($slug){
        $details=Blog::where('slug', $slug)->first();
        return view('frontend.blog', compact('details'));
    }
}
