<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'user_id','contents','name'
    ];

    public function  sents(){
        return $this->hasMany('App\Sent');
     }

     public function  user(){
        return $this->belongsTo('App\User');
     }
}
