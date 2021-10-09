<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeMuseumController extends Controller
{
    public function museum() {
        return $this->belongsTo('App\Museum');
    } 
    
    public function user() {
        return $this->belongsTo('App\User');
    } 
}
