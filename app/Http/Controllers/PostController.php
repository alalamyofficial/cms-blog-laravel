<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(5);

        return view('template_admin.posts.index')->with('posts',$posts);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();
        $categories = Category::all();

        return view('template_admin.posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'required',


        ]);

        $image = $request->image;

        $new_image = time().$image->getClientOriginalName();

        $post = Post::create([

            "title"     => $request->title,
            "category_id"  => $request->category_id,
            "content"  => $request->content,
            "image"  => 'public/uploads/posts/'.$new_image,
            "slug" => Str::slug($request->title),
            'user_id' => Auth::id()

        ]);

        $post->tags()->attach($request->tags); //tags here mean tags[] in create.blade.php in post folder

        $image->move('public/uploads/posts',$new_image);

        return redirect()->route('posts.index')->with('Success','Post Cretaed Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('template_admin.posts.edit')->with('post',$post)->with('tags',$tags)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'title' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'image' => 'sometimes',


        ]);


        


        $post = Post::findOrFail($id);

        if ($request->has('image')) {
            
            $image = $request->image;

            $new_image = time().$image->getClientOriginalName();

            $image->move('public/uploads/posts/',$new_image);

            $post->image = 'public/uploads/posts/'.$new_image;

            
                $post_update =[
        
                    "title"     => $request->title,
                    "category_id"  => $request->category_id,
                    "content"  => $request->content,
                    "image"  => 'public/uploads/posts/'.$new_image,
                    "slug" => Str::slug($request->title)
        
        
                ];
        }else{

            $post_update =[
        
                "title"     => $request->title,
                "category_id"  => $request->category_id,
                "content"  => $request->content,
                "slug" => Str::slug($request->title)
    
    
            ];

        }



        $post->tags()->sync($request->tags); //tags here mean tags[] in create.blade.php in post folder

        $post->update($post_update);

        $post->save();

        return redirect()->route('posts.index')->with('Success','Post Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        $post->delete();

        return redirect()->route('posts.index')->with('Success','Post Deleted Successfully');


    }

    public function showDeletedItems(){

        $deletedPosts = Post::onlyTrashed()->paginate(5);
        // $post = Post::onlyTrashed()->paginate(5);

        return view('template_admin.posts.showDeleteditems')->with('deletedPosts',$deletedPosts);

    }

    public function restore($id){

        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();

        return redirect()->route('posts.index')->with('Success','Post Restored Successfully');

    }

    public function forceDelete($id){

        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        return redirect()->route('posts.index')->with('Success','Post Restored Successfully');

    }
    public function count(){


        $posts = Post::all();

        return view('template_admin.posts.index')->with('posts',$posts);        


    }

}
