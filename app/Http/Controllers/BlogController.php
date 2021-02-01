<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\User;
use App\Category;

class BlogController extends Controller
{
    public function index(Post $posts, Category $categories, Tag $tags){

        $data = $posts->orderBy('created_at','desc')->get();
        $data_category = $categories->orderBy('created_at','desc')->get();
        $data_tags = $tags->orderBy('created_at','desc')->get();


        return view('blog')->with('data',$data)->with('data_category',$data_category)->with('data_tags',$data_tags);

    }

    public function content($slug , Category $categories, Tag $tags , Post $posts){

        $data = Post::where('slug',$slug)->get();
        $data_category = $categories->orderBy('created_at','desc')->get();
        $data_tags = $tags->orderBy('created_at','desc')->get();
        $data_posts = $posts->orderBy('created_at','desc')->get();


        return view('blog.content_post')->with('data_category',$data_category)->with('data_tags',$data_tags)
        ->with('slug',$slug)->with('data',$data)->with('data_posts',$data_posts);


    }


}
