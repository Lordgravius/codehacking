<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

  protected $fillable = [
      'name', 'email', 'password',
  ];
  
  protected $hidden = [
      'password', 'remember_token',
  ];
    
  public function role() {
    return $this->belongsTo('App\Model\Role');  
  }
    
    
}
