<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = \App\Models\Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function PostAuthor($id) {
        $post = \App\Models\Post::find($id);
        return view('post-author', ['post' => $post]);
    }

    public function create() {
        $users = \App\Models\User::all();
        return view('post-create', ['users' => $users]);
    }

    public function store(Request $request) {
        $post = new \App\Models\Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();

        return redirect('/posts');
    }

    public function edit($id) {
        $users = \App\Models\User::all();
        $post = \App\Models\Post::find($id);
        return view('post-edit', ['post' => $post, 'users' => $users]);
    }

    public function update(Request $request, $id) {
        $post = \App\Models\Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect('/posts');
    }

    public function destroy($id) {
        $post = \App\Models\Post::find($id);
        $post->delete();
        return redirect('/posts');
    }
}
