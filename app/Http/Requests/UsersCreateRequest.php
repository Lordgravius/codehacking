<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersCreateRequest extends Request {

  public function authorize() {
    return true;
  }
  
  public function rules() {
    return [
      'name'      => 'required|string|max:150',
      'email'     => 'required|email',
      'role_id'   => 'required|integer',
      'is_active' => 'required|boolean',
      'password'  => 'required',
      'photo'     => 'filled'
    ];
  }
  
  public function messages() {
    return [
      'name.required' => 'A név megadása kötelező!',
      'email.required' => 'Az email megadása kötelező!',
      'email.email' => 'Az email formátuma nem megfelelő!',
      'role_id.required' => 'A user jogosultsági szint megadása kötelező!',
      'is_active.required' => 'A user státusz megadása kötelező!',
      'password.required' => 'A jelszó megadása kötelező!'
    ];
  }
}
