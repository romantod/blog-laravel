<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search'); // читаем ?search=... из URL, кладём в переменную
        $userId = $request->input('user_id'); // читаем выбранного автора из URL (?user_id=2)
        $categoryId = $request->input('category_id'); // читаем ?category_id=... из URL

        $sort = $request->input('sort', 'created_at'); // читаем ?sort=... из URL, если нет — по умолчанию 'created_at'

        $order = $sort === 'title' ? 'asc' : 'desc'; // если сортируем по title — алфавит (asc), иначе — новые сначала (desc)

        if ($sort === 'name') {
            $query = Post::join('categories', 'posts.category_id', '=', 'categories.id')
                ->orderBy('categories.name', 'asc');
        } else {
            $query = Post::orderBy($sort, $order);
        }


        if ($search) {
            $query->where('title', 'like', '%' . $search . '%'); // добавляем условие к запросу
        }

        if ($userId) { // добавляем фильтр по автору только если он выбран
            $query->where('user_id', $userId); // еще добавляем условие к запросу
        }

        if ($categoryId) { 
            $query->where('category_id', $categoryId); // добавляем WHERE category_id = ?
        }

        
            
            
        $categories = Category::all();
        $users = User::orderBy('name')->get();
        $posts = $query->get();
        return view('posts', ['posts' => $posts, 'users' => $users, 'categories' => $categories]);
    }

    public function show(Post $post) {        
        return view('post-show', ['post' => $post]);
    }

    public function create() {
        $users = User::all();
        $categories = Category::all();
        return view('post-create', ['users' => $users, 'categories' => $categories]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id', // user_id должен существовать в таблице users
            'excerpt' => 'max:300',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        Post::create($request->only(['title', 'content', 'user_id', 'excerpt', 'category_id']));
        return redirect('/posts')->with('success', 'Пост успешно создан!');
    }

    public function edit(Post $post) {        
        $users = User::all();
        $categories = Category::all();
        return view('post-edit', ['post' => $post, 'users' => $users, 'categories' => $categories]);
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id', // user_id должен существовать в таблице users
            'excerpt' => 'max:300',
            'category_id' => 'nullable|exists:categories,id'
        ]);
        
        $post->update($request->only(['title', 'content', 'user_id', 'excerpt', 'category_id']));
        return redirect('/posts')->with('success', 'Пост успешно обновлен!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/posts')->with('success', 'Пост успешно удален!');
    }
}
