<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sent extends Model
{
    protected $fillable = [
        'user_id','bulk_id','template_id','status','email',
    ];

    public function  template(){
        return $this->belongsTo('App\Template');
     }

     public function  bulk(){
        return $this->belongsTo('App\Bulk');
     }

     public function  user(){
        return $this->belongsTo('App\User');
     }


}
