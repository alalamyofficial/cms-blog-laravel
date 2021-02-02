<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Tag;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('template_admin/home');
        $num_of_posts = Post::all();
        $num_of_categories = Category::all();
        $num_of_tags = Tag::all();
        $num_of_users = User::all();

        return view('home')->with('num_of_posts',$num_of_posts)
        ->with('num_of_categories',$num_of_categories)
        ->with('num_of_tags',$num_of_tags)
        ->with('num_of_users',$num_of_users);
    }


}
