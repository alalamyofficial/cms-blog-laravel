<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id','desc')->paginate(5);

        return view('template_admin.tags.index')->with('tags',$tags);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template_admin.tags.create');
        
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

            'name' => 'required|min:3'

        ]);

        Tag::create([


            'name' => $request->name,
            'slug' => Str::slug($request->name)

        ]);

        return redirect()->route('tags.index')->with('Success','Tag Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('template_admin.tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[

            'name' => 'required|min:3'

        ]);

        $tag_data = [

            'name' => $request->name,
            'slug' => Str::slug($request->name)            

        ];

        Tag::whereId($id)->update($tag_data);

        return redirect()->route('tags.index')->with('Success','Tag Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->destroy($id);
        return redirect()->route('tags.index')->with('Success','Tag Deleted Successfully');

    }
}
