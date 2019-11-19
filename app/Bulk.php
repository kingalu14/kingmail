<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulk extends Model
{
    protected $fillable = [
        'user_id','name'
    ];

  

    public function  contancts(){
        return $this->hasMany('App\Contact');
     }

     public function  sents(){
        return $this->hasMany('App\Sent');
     }


     public function  user(){
        return $this->belongsTo('App\User');
    }

}
