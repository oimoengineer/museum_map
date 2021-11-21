<?php

namespace App\Http\Controllers;
// namespace Illuminate\Contracts\Filesystem\Filesystem;

use App\Museum;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMuseumPost;

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
        $museum = new Museum;
        \Storage::disk('local')->exists('public/storage/'.$museum->image);
        $museums = \App\Museum::orderBy('created_at', 'desc')->paginate(9);
        return view('index', ['museums' => $museums, 'museum' => $museum]);
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $name_01 = '美術館';
        $name_02 = '博物館';
        $name_03 = 'ギャラリー';
        $datum = [
            'name' => $name_01,
            'name' => $name_02,
            'name' => $name_03
        ];
        

        $categories = DB::table('categories')->insert($datum);
        return view('new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMuseumPost $request)
    {
        $museum = new Museum;
        $user = \Auth::user();
        $museum->name = request('name');
        $museum->address = request('address');
        $museum->museum_url = request('museum_url');
        $museum->category_id = request('category_id');
        $museum->comment = request('comment');
        $filename = $request->file('thefile')->store('public');
        $museum->museum_image = str_replace('public/', '', $filename);
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
    public function show($id, Request $request)
    {
        $museum = Museum::find($id);
        \Storage::disk('local')->exists('public/storage/'.$museum->image);
        $user = \Auth::user();
        \Storage::disk('local')->exists('public/storage/profile_images'.$user->image);
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = '';
        }

        return view('show', ['museum' => $museum, 'user' => $user, 'login_user_id' => $login_user_id] );
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
    public function update(StoreMuseumPost $request, Museum $museum, $id)
    {
        $museum = Museum::find($id);
        $user = \Auth::user();
        $museum->name = request('name');
        $museum->address = request('address');
        $museum->museum_url = request('museum_url');
        $museum->category_id = request('category_id');
        $museum->comment = request('comment');
        $filename = $request->file('thefile')->store('public');
        $museum->image = str_replace('public/', '', $filename);
        $museum->user_id = $user->id;
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
