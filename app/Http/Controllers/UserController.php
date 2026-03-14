<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function show(User $user) {
        return view('user-show', ['user' => $user]);
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             

    public function create() {
        return view('user-create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'bio' => 'nullable|max:500'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->bio = $request->bio;
        $user->save();

        return redirect('/users/' . $user->id)->with('success', 'Пользователь успешно создан!');
    }

    public function edit(User $user) {
        return view('user-edit', ['user' => $user]);
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Чтобы пользователь мог оставить свой же email (игнорируем его ID при проверке уникальности)
            'password' => 'nullable|min:4|confirmed', // nullable чтобы при редактировании пользователь мог не менять пароль, confirmed требует создать password_confirmation в форме
            'bio' => 'nullable|max:500'
        ]);

        $user->name = $request->name; // берёт данные из формы (как $_POST['name']) и сохраняет
        $user->email = $request->email;
        $user->bio = $request->bio;

        // обновляем пароль только если он введен
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect('/users#user-' . $user->id)->with('success', 'Пользователь успешно обновлен!');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/users')->with('success', 'Пользователь успешно удален!');
    }

    public function userPosts(User $user) {
        $posts = $user->posts()->latest()->get(); // Магия связей!
        return view('user-posts', ['user' => $user, 'posts' => $posts]);
    }
        
    public function userLatestsPosts(User $user) {
        $posts = $user->posts()->latest()->limit(3)->get();
        return view('user-latest-posts', ['user' => $user, 'posts' => $posts]);
    }
    
}


