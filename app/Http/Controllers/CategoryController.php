<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);

        return view('template_admin.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template_admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[

            'name' => 'required|min:3'

        ]);

        Category::create([


            'name' => $request->name,
            'slug' => Str::slug($request->name)

        ]);

        return redirect()->route('categories.index')->with('Success','Categroy Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('template_admin.categories.edit')->with('category',$category);
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[

            'name' => 'required|min:3'

        ]);

        $category_data = [

            'name' => $request->name,
            'slug' => Str::slug($request->name)            

        ];

        Category::whereId($id)->update($category_data);

        return redirect()->route('categories.index')->with('Success','Categroy Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        $category->destroy($id);
        return redirect()->route('categories.index');
    }
}
