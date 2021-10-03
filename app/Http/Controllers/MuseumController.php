<?php

namespace App\Http\Controllers;

use App\Museum;
use App\Category;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome','index', 'show']);
    }


    public function welcome()
    {
        return view('welcome');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $museums = Museum::all();
        return view('index', ['museums' => $museums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $museum = new Museum;
        $user = \Auth::user();

        $museum->name = request('name');
        $museum->address = request('address');
        $museum->category_id = request('category_id');
        $museum->comment = request('comment');
        $museum->user_id = $user->id;
        $museum->save();
        return redirect()->route('museum.detail', ['id' => $museum->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $museum = Museum::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = '';
        }
        return view('show', ['museum' => $museum, 'login_user_id' => $login_user_id] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function edit(Museum $museum, $id)
    {
        $museum = Museum::find($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('edit', ['museum' => $museum, 'categories' => $categories]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Museum $museum, $id)
    {
        $museum = Museum::find($id);
        $museum->name = request('name');
        $museum->address = request('address');
        $museum->category_id = request('category_id');
        $museum->comment = request('comment');
        $museum->save();
        return redirect()->route('museum.detail', ['id' => $museum->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $museum = Museum::find($id);
        $museum->delete();
        return redirect('/museums');
    }
}
