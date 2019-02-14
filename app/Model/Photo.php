<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
    
  protected $fillable = [ 'file' ];
  
  protected $uploadir = '/images/' ;
  
  public function getFileAttribute($photo) {
    return $this->uploadir . $photo;
  }
  
}
