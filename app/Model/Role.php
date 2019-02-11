<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [];
  
    protected $hidden = [];
  
    public function user() {
      return $this->hasOne('App\Model\User');
    }
}
