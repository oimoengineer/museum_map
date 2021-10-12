<?php

namespace App\Http\Controllers;

use App\Museum;
use App\Category;
use App\User;
use Auth;
use Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $museum_paginate = DB::table('museums')->paginate(9);
        return view('index', ['museums' => $museums, 'museum_paginate' => $museum_paginate]);
    }

    public function search(Request $request)
    {
        $keyword_name = $request->name;

        if(!empty($keyword_name)) {
            $query = Museum::query();
            $museums = $query->where('name','like', '%' .$keyword_name. '%')->get();
            $message = "「". $keyword_name."」を含む施設の検索が完了しました。";
            return view('/search')->with([
            'museums' => $museums,
            'message' => $message,
        ]);
        } else {
            $message = '検索結果はありません。';
            return view('/search')->with('message', $message);
        }
    }

    public function setting() 
    {
        $users = \Auth::user();
        return view('setting', ['users' => $users] );
    }

    public function setting_edit()
    {
        $users = \Auth::user();
        return view('setting_edit', ['users' => $users] );
    }

    public function setting_store()
    {
        $request->validate([
            'user_image'=>['file', 'mimes:jpeg,png,jpg,bmb', 'max:2048'],
        ]);

        if($file = $request->user_image){
            // 保存するファイルに名前をつける
            $fileName = time().'.'.$file->getClientOriginalExtension();
            // Laravel直下のpublicディレクトリに新フォルダをつくり保存する
            $target_path = public_path('/uploads/');
            $file->move($target_path, $user_image);
        } 
        $request->user()->create([
            'user_image'=>$fileName,
        ]);
    }

    public function setting_update(Request $request)
    {
        $users = \Auth::user();
        $users->name = request('name');
        $users->email = request('email');
        $users->password = bcrypt($request->get('new-password'));
        $filename=$request->$file('thefile')->store('public');
        $users->user_image = str_replace('public/', '', $filename);
        $users->save();
        return redirect()->back()->with('update_password_success', 'ユーザー情報を更新しました');

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
        $filename = $request->$file('thefile')->store('public');
        $museum->museum_image = str_replace('public/', '', $filename);
        $museum->save();
        return redirect()->route('museum.detail', ['id' => $museum->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Museum  $museum
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $museum = Museum::find($id);
        $user = \Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = '';
        }
        Storage::disk('local')->exists('public/storage/' .$museum->museum_image);

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
        $filename=$request->$file('thefile')->store('public');
        $museum->museum_image = str_replace('public/', '', $filename);
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

    // likeMuseums
    public function like(MuseumSearchService $museumSearchService, Request $request)
    {
        
    }



}
