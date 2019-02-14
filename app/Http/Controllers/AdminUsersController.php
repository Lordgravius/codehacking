<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Model\User;
use App\Model\Photo;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller {
  
  public function index() {
    $users = User::all();
    return view('admin.users.index', compact('users'));
  }

  public function create() {
    $roles = DB::table('roles')->select('id', 'name')->get();
    return view('admin.users.create', compact('roles'));
  }

  public function store(UsersCreateRequest $request) {
    
    /*$user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->pwd."salted");
    $user->role_id = (int) $request->role;
    $user->is_active = (int) $request->status;
    $user->save();*/
    
    $input = $request->all();

    if($file = $request->file('photo_id')) {
      $name = time() . $file->getClientOriginalName();
      $file->move('images', $name);
      $photo = Photo::create(['file' => $name]);
      $input['photo_id'] = $photo->id;
    }

    $input['password'] = bcrypt($request->password."salted");
    User::create($input);
    return redirect('admin/users');
  }

  public function show($id) {
    return view('admin.users.show');
  }

  public function edit($id) {
    return view('admin.users.edit');
  }

  public function update(Request $request, $id) {
    return view('admin.users.update');
  }

  public function destroy($id) {
    //
  }
  
}
