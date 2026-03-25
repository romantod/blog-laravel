<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Http\Resources\PostResource;
use App\Http\Resources\VacancyResource;
use App\Services\PostService;
use App\Jobs\LogPostCreated;

class PostController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search'); // читаем ?search=... из URL, кладём в переменную
        $userId = $request->input('user_id'); // читаем выбранного автора из URL (?user_id=2)
        $categoryId = $request->input('category_id'); // читаем ?category_id=... из URL
        $tagId = $request->input('tag_id');

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

        if ($tagId) { 
            $query->whereHas('tags', function($q) use ($tagId) {
                $q->where('tags.id', $tagId);
            });
        }    
            
        $tags = Tag::all();
        $categories = Category::all();
        $users = User::orderBy('name')->get();
        $posts = $query->paginate(5)->withQueryString();
        return view('posts', ['posts' => $posts, 'users' => $users, 'categories' => $categories, 'tags' => $tags]);
    }

    public function show(Post $post) {        
        return view('post-show', ['post' => $post]);
    }

    public function create() {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post-create', ['users' => $users, 'categories' => $categories, 'tags' => $tags]);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id', // user_id должен существовать в таблице users
            'excerpt' => 'max:300',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        
        $post = Post::create($request->only(['title', 'content', 'user_id', 'excerpt', 'category_id']));
        $post->tags()->sync($request->input('tags', []));
        LogPostCreated::dispatch($post); // отправляет Job в очередь. То есть говорит Laravel: "возьми этот Job с этими данными и положи в таблицу jobs, worker разберётся"
        // LogPostCreated::dispatch($post)->delay(now()->addSeconds(30));
        return redirect('/posts')->with('success', 'Пост успешно создан!');
        // $request->input('tags', []) — читает массив выбранных тегов из формы, если ничего не выбрано — пустой массив. sync берёт этот массив id и записывает связи в таблицу post_tag
    }

    public function edit(Post $post) {        
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post-edit', ['post' => $post, 'users' => $users, 'categories' => $categories, 'tags' => $tags]);
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
        $post->tags()->sync($request->input('tags', []));
        return redirect('/posts/' . $post->id)->with('success', 'Пост успешно обновлен!');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('/posts')->with('success', 'Пост успешно удален!');
    }

    public function apiIndex() {
        $posts = Post::paginate(5);
        return response()->json($posts);
    }

    public function apiShow(Post $post) {
        return new PostResource($post);
    }

    public function apiTags(Post $post) {
        return response()->json($post->tags);
    }

    public function apiStore(Request $request) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ]);

        $post = Post::create($request->only(['title', 'content', 'user_id', 'excerpt', 'category_id']));
        return (new PostResource($post))->response()->setStatusCode(201);
        // 201 — HTTP статус код "Created". Это правильный код для успешного создания ресурса.
    }

    public function apiDestroy(Post $post) {
        $post->delete();
        return response()->noContent();        
    }

    public function apiUpdate(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'content' => 'required|min:10',
            'user_id' => 'required|exists:users,id',
            'excerpt' => 'max:300',
            'category_id' => 'nullable|exists:categories,id'
        ]);

        $post->update($request->only(['title', 'content', 'user_id', 'excerpt', 'category_id']));
        return new PostResource($post);    
    }

    public function apiVacancies(Request $request) {

        $context = stream_context_create(['http' => ['header' => 'User-Agent: Mozilla/5.0']]);

        $text = $request->input('text', 'PHP developer');

        $json = file_get_contents('https://api.hh.ru/vacancies?text=' . $text . '&area=1146', false, $context);
        $data = json_decode($json, true);
        $items = $data['items'];
        return VacancyResource::collection($items);
    }
}

