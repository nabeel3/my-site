<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('children')->get();
        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->thumbnail);
        $category = new Category();
        $category->title = $request->title;
        $category->content = $request->content;
        $filename = sprintf('thumbnail_%s.jpg',random_int(1, 1000));

        if ($request->hasFile('thumbnail')) 

        $file = $request->file('thumbnail');

         $fileName = $request->file('thumbnail')->getClientOriginalName();

            $destinationPath = 'images/blog';
            $file->move($destinationPath,$file->getClientOriginalName());
        $category->thumbnail= $fileName;
        $category->parent_id= $request->parent_id == 0 ?? $category->parent_id;
        $save = $category->save();
    
        if ($save) {
            return redirect()->route('categories.index');
            # code...
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   
        $categories = Category::where('id', '<>', $category->id)->get();
        return view('dashboard.categories.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $category->title = $request->title;
        $category->content = $request->content;
        $filename = sprintf('thumbnail_%s.jpg',random_int(1, 1000));

        if ($request->hasFile('thumbnail')){ 

        $file = $request->file('thumbnail');

        $fileName = $request->file('thumbnail')->getClientOriginalName();

        $destinationPath = 'images/blog';
        $file->move($destinationPath,$file->getClientOriginalName());
        }
        else{
        $filename = $filename;
        }
        $category->thumbnail= $category->thumbnail;
        $category->parent_id= $request->parent_id;
        $save = $category->save();
    
        if ($save) {
            return redirect()->route('categories.index');
            # code...
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
