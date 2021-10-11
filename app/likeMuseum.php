<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likeMuseum extends Model
{
    public function museum() {
        return $this->belongsTo('App\Museum');
    } 
    
    public function user() {
        return $this->belongsTo('App\User');
    } 
}
