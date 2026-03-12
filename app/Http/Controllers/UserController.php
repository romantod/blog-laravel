<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view ('hello', [
            'name' => 'Иван',
            'age' => 25
        ]);
    }

    public function users() {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function showOneUser(User $user) {
        return view('user-detail', ['user' => $user]);
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             

    public function create() {
        return view('user-create');
    }

    public function store(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/users')->with('success', 'Пользователь успешно создан!');
    }

    public function edit(User $user) {
        return view('user-edit', ['user' => $user]);
    }

    public function update(Request $request, User $user) {
        $user->name = $request->name; // берёт данные из формы (как $_POST['name'])
        $user->email = $request->email;
        $user->save(); // выполняет INSERT INTO users ...

        return redirect('/users')->with('success', 'Пользователь успешно обновлен!');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/users')->with('success', 'Пользователь успешно удален!');
    }

    public function userPosts(User $user) {
        $posts = $user->posts; // Магия связей!
        return view('user-posts', ['user' => $user, 'posts' => $posts]);
    }
}


