<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserEdit;



class UseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        \Storage::disk('local')->exists('public/storage/profile_images/'.$user->image);
        return view('setting', ['user' => $user] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserEdit $request)
    {
        $user = \Auth::user();
        $user->save();
        return redirect()->route('user.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \Auth::user();
        return view('setting_edit', ['user' => $user] );
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserEdit $request)
    {
        $user = \Auth::user();
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt($request->get('new-password'));
        $filename = $request->file('user_file')->store('public');
        $user->image = str_replace('public/', '', $filename);
        $user->save();
        return redirect()->back()->with('update_password_success', 'ユーザー情報を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();

        Auth::logout();
        $user->delete();
        return redirect("/welcome");
    }

    




}
