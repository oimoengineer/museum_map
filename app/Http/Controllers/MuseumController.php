<?php

namespace App\Http\Controllers;

use App\Museum;
use App\Category;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
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
        $museum->name = request('name');
        $museum->address = request('address');
        $museum->category_id = request('category_id');
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
        return view('show', ['museum' => $museum] );
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
