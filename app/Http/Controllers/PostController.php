<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function show(Post $post) {
        return view('post-show', ['post' => $post]);
    }

    public function create() {
        $users = User::all();
        return view('post-create', ['users' => $users]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id' // user_id должен существовать в таблице users
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();

        return redirect('/posts')->with('success', 'Пост успешно создан!');
    }

    public function edit(Post $post) {        
        $users = User::all();
        return view('post-edit', ['post' => $post, 'users' => $users]);
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id' // user_id должен существовать в таблице users
        ]);
        
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;
        $post->save();

        return redirect('/posts')->with('success', 'Пост успешно обновлен!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/posts')->with('success', 'Пост успешно удален!');
    }
}
