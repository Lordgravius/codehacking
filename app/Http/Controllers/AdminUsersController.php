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


    public function store(Request $request)
    {
        return view('admin.users.store');
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
