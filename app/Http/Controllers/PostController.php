<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Post;
use Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();


//        $posts = Post::with('getUserPost')->where('user_id', '=', '1')->get();
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $filename = sprintf('thumbnail_%s.jpg',random_int(1, 1000));


        if ($request->hasFile('thumbnail'))
            $file = $request->file('thumbnail');
        $fileName = $request->file('thumbnail')->getClientOriginalName();
        $destinationPath = 'images/blog';
        $file->move($destinationPath,$file->getClientOriginalName());
        $post->thumbnail= $fileName;
        $save = $post->save();

        if ($save) {
            return redirect()->route('posts.index');
            # code...
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $post = Post::find($id);
//        if (! Gate::allows('edit-settings', $post)) {
//            abort(403);
//        }
//         $response = Gate::inspect('edit-settings');
//
//        if ($response->allowed()) {
            return view('dashboard.posts.edit', compact('post'));
//        } else {
//            echo $response->message();
//        }





    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
