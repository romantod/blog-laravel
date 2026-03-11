<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index() {
        return view ('hello', [
            'name' => 'Иван',
            'age' => 25
        ]);
    }

    public function showUser($id) {
        return view('user', [
            'userId' => $id
        ]);
    }

    public function users() {
        $users = \App\Models\User::all();
        return view('users', ['users' => $users]);
    }

    public function showOneUser($id) {
        $user = \App\Models\User::find($id);
        return view('user-detail', ['user' => $user]);
    }

    public function create() {
        return view('user-create');
    }

    public function store(Request $request) {
        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/users');
    }

    public function edit($id) {
        $user = \App\Models\User::find($id);
        return view('user-edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $user = \App\Models\User::find($id);
        $user->name = $request->name; // берёт данные из формы (как $_POST['name'])
        $user->email = $request->email;
        $user->save(); // выполняет INSERT INTO users ...

        return redirect('/users');
    }

    public function destroy($id) {
        $user = \App\Models\User::find($id);
        $user->delete();
        return redirect('/users');
    }

    public function userPosts($id) {
        $user = \App\Models\User::find($id);
        $posts = $user->posts; // Магия связей!
        return view('user-posts', ['user' => $user, 'posts' => $posts]);
    }
}


