<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search'); // читаем поисковый запрос из URL (?search=...)
        $userId = $request->input('user_id'); // читаем выбранного автора из URL (?user_id=2)

        $sort = $request->input('sort', 'created_at');
        $order = $sort === 'title' ? 'asc' : 'desc'; // если сортировка по заголовку, то будет в алфавитном порядке

        $query = Post::orderBy($sort, $order); // начинаем строить SQL запрос

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%'); // добавляем условие к запросу
        }

        if ($userId) { // добавляем фильтр по автору только если он выбран
            $query->where('user_id', $userId); // еще добавляем условие к запросу
        }

        $users = User::orderBy('name')->get();
        $posts = $query->get();
        return view('posts', ['posts' => $posts, 'users' => $users]);
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
            'user_id' => 'required|exists:users,id', // user_id должен существовать в таблице users
            'excerpt' => 'max:300'
        ]);

        Post::create($request->only(['title', 'content', 'user_id', 'excerpt']));
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
            'user_id' => 'required|exists:users,id', // user_id должен существовать в таблице users
            'excerpt' => 'max:300'
        ]);
        
        $post->update($request->only(['title', 'content', 'user_id', 'excerpt']));
        return redirect('/posts')->with('success', 'Пост успешно обновлен!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/posts')->with('success', 'Пост успешно удален!');
    }
}
