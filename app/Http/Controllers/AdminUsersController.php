<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request) {
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->pwd."salted");
        $user->role_id = (int) $request->role;
        $user->save();
        
        $users = User::all();
      
        return view('admin.users.index', compact('users'));
    }


    public function show($id)
    {
        return view('admin.users.show');
    }


    public function edit($id)
    {
        return view('admin.users.edit');
    }


    public function update(Request $request, $id)
    {
        return view('admin.users.update');
    }


    public function destroy($id)
    {
        //
    }
}
