<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersEditRequest;
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
    $user = User::findOrFail($id);
    $roles = DB::table('roles')->select('id', 'name')->get();
    return view('admin.users.edit', compact('user', 'roles'));
  }

  public function update(UsersEditRequest $request, $id) {

    $input = $request->all();
    
/*    if(bcrypt($request->oldpassword."salted") != $user = User::find($id)->password)
      return redirect()->back()->withErrors(['token' => 'The Old password not passed!']);*/
    

    
    if($request->newpassword != $request->newpasswordagain)
      return redirect()->back()->withErrors(['token' => 'The New password confirmation not passed!']);

    // File törlés és update még nins kész.
    
    if($file = $request->file('photo_id')) {
      $name = time() . $file->getClientOriginalName();
      $file->move('images', $name);
      $photo = Photo::create(['file' => $name]);
      $input['photo_id'] = $photo->id;
    }
    // Véglegesíteni a felhasználó mentését.
    // Csak jelszó cserénél várja el, hogy a passwordök meg legyenek adva.
    $request->password = bcrypt($request->newpassword."salted");
    User::find($id)->save($request->all());
    
    
    dd($request->all(), $id);
    return view('admin.users.index');
  }

  public function destroy($id) {
    //
  }
  
}
