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
        $data_category = $categories->orderBy('created_at','desc')->take(5)->get();
        // $data_category = $categories->lateset()->take(5)->get(); or
        $data_tags = $tags->orderBy('created_at','desc')->take(5)->get();


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

    public function list_blog(Category $categories, Tag $tags){

        $category_widget = Category::all();

        $data_category = $categories->orderBy('created_at','desc')->get();
        $data_tags = $tags->orderBy('created_at','desc')->get();

    	$data = Post::latest()->paginate(5);
        return view('blog.list_post')->with('data',$data)->with('category_widget',$category_widget)
        ->with('data_category',$data_category)->with('data_tags',$data_tags);

    }

    public function list_category(Category $categories , Tag $tags){
        $data_category = Category::all();
        $data_tags = $tags->orderBy('created_at','desc')->get();
        $data = $categories->posts()->paginate(6);
        return view('blog.list_post')->with('data',$data)->with('data_category',$data_category)->with('data_tags',$data_tags);
    }

    public function search(Request $request, Category $categories , Tag $tags){
        $data_category = Category::all();
        $data_tags = $tags->orderBy('created_at','desc')->get();
        // $data = Post::query()->where('title', $request->title)->orWhere('title','like','%'.$request->title.'%')->paginate(6);
        
            // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $data = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->paginate(6);
            
        if(!$data){

            return view('/');

        }else{

                return view('blog.list_post')->with('data',$data)->with('data_category',$data_category)->with('data_tags',$data_tags);

        }


   
    }

    public function getRandomPost(){
        $post = Post::inRandomOrder()->first();
        return redirect()->route('posts.show', ["id" => $post->id]);
    }

}
