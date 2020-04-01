<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        return '/storage/'. ($this->image ? $this->image :'/profile/No_image_available.svg');
    }
    public function user(){
       return $this->belongsTo(User::class);
   }

   public function followers(){
       return $this->belongsToMany(User::class);
   }
}
