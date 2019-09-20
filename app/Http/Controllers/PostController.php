<?php

namespace App\Http\Controllers;

use App\Post;
use Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(5);

        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        if(!Gate::allows('isAdmin') && !Gate::allows('isAuthor') ){
            abort(404,"Sorry, You can do this actions");
        }

        return view('admin.post.create');
    }


    public function store(Request $request)
    {
        if(!Gate::allows('isAdmin') && !Gate::allows('isAuthor') ){
            abort(404,"Sorry, You can do this actions");
        }


        $this->validate($request, [

            'title' => 'required||unique:posts',
            'body' => 'required',

        ]);


        Post::create($request->all());

        return redirect()->route('post.create')
            ->with(['message' => 'Post Info Saved Successfully']);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if(!Gate::allows('isAdmin') && !Gate::allows('isAuthor') ){
            abort(404,"Sorry, You can do this actions");
        }


        $post = Post::find($id);

        return view('admin.post.edit',compact('post'));
    }


    public function update(Request $request, $id)
    {

        if(!Gate::allows('isAdmin') && !Gate::allows('isAuthor') ){
            abort(404,"Sorry, You can do this actions");
        }

        $post = Post::find($id);

        $this->validate($request, [

            'title' => 'required||unique:posts,title,'.$post->id,
            'body' => 'required',
        ]);


        $post->update($request->all());

        return redirect()->route('post.index')
            ->with(['message' => 'Post Info Updated Successfully']);
    }


    public function destroy($id)
    {

        if(!Gate::allows('isAdmin') ){
            abort(404,"Sorry, You can do this actions");
        }

        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->route('post.index')
            ->with(['message' => 'Post Info Deleted Successfully']);
    }
}
