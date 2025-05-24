<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $request->validate([
            'title'        =>'required',
            'picture'        =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'        =>'required',
        ]);

        // $file_name=time(). '.'.request()->picture->getClientOriginalExtension();
        $fileName = time() . $request->file('picture')->getClientOriginalName();
        // request()->picture->move('storage/app/public/images/',$file_name);
        $path = $request
            ->file('picture')
            ->storeAs('images', $fileName, 'public');
        $input['picture'] = 'storage/' . $path;

        $posts=new Post;
        $posts->id=$request->id;
        $posts->title=$request->title;
        $posts->picture=$fileName;
        $posts->content=$request->content;
        $posts->save();
        // $input = $request->all();
        // $fileName=time().$request->file('picture')->getClientOriginalName();
        // $path=$request->file('picture')->storeAs('images',$fileName,'public');
        // $input["picture"] = '/storage/'.$path;
        // Post::create($input);
        return redirect('posts')->with('flash_message', 'post ajouté !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('posts', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('posts', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $input = $request->all();
        $post->update($input);
        return redirect('posts')->with('flash_message', 'post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect('posts')->with('flash_message', 'post deleted!');
    }
}
