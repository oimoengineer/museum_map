@extends('layout')

@section('content')
  <h1>{{$museum->name}}</h1>
  <div>
    <p>{{$museum->category->name}}</p>
    <p>{{$museum->address}}</p>
  </div>
  <div>
    <a href={{route('museum.list')}}>一覧に戻る</a>
  </div>
@endsection