<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index(Request $request)
    {
        $users = $this->users->search($request->all())->get();
        return view('users.index', compact('users', 'request'));
    }

    public function show($id)
    {
        $user = $this->users->find($id);
        return view('users.details', compact('user'));
    }

    public function delete($id)
    {
        $users = $this->users->find($id);
        $users->delete();
        return redirect()->route('user.index')->withSuccess('Usuario eliminado satisfactoriamente');
    }

    public function create()
    {
        return view('users.form', ['edit' => false]);
    }

    public function store(RegisterRequest $request)
    {
        $this->users->create(array_merge(
            $request->only('email', 'phone', 'password', 'name', 'last_name', 'role')
        ));
        return redirect()->route('user.index')->withSuccess('Usuario creado satisfactoriamente');
    }

    public function edit($id)
    {
        $user = $this->users->find($id);
        $edit = true;
        return view('users.form', compact('user', 'edit'));
    }

    public function update($id, Request $request)
    {
        $users = $this->users->find($id);
        $data = array_merge($request->only('email', 'phone', 'name', 'last_name', 'role'));
        if(isset($request->password)){
            $data['password'] = $request->password;
        }
        $this->users->update($users, $data);
        return redirect()->route('user.index')->withSuccess('Usuario actualizado satisfactoriamente');
    }
}
