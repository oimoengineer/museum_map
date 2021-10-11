<?php

namespace App\Http\Controllers;
use App\Museum;
use App\LikeMuseum;
use Auth;
use Illuminate\Http\Request;

class LikeMuseumController extends Controller
{

    public function store(Request $request)
    {
        $likeMuseum = new LikeMuseum;
        $likeMuseum->museum_id = $request->museum_id;
        $likeMuseum->user_id = Auth::user()->id;
        $likeMuseum->save();

        return redirect()->route('museum.detail', [$request->museum_id]);

    }
    
    public function destroy(Request $request, $id) 
    {
        $museum = Museum::findOrFail($id);

        $museum->likeMuseum()->delete();

        return redirect()->route('museum.detail', [$request->museum_id]);
    }

}
